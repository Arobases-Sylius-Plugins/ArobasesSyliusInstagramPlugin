<?php
declare(strict_types=1);

namespace Arobases\SyliusInstagramPlugin\Command;

use Arobases\SyliusInstagramPlugin\Entity\InstagramData;
use Arobases\SyliusInstagramPlugin\Model\ChannelInterface;
use Arobases\SyliusInstagramPlugin\Repository\InstagramDataRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InstagramCommand extends Command
{
    protected static $defaultName = 'arobases:get-data';

    public function __construct(private ChannelContextInterface $channelContext, private InstagramDataRepository $instagramDataRepository, private EntityManagerInterface $entityManager)
    {
        parent::__construct();
    }


    protected function configure(): void
    {
        $this
            ->setDescription('save data from instagram')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var ChannelInterface $channel */
        $channel = $this->channelContext->getChannel();

        $token = $channel->getInstagramToken();

        if ($token === null) {
            return Command::FAILURE;
        }

        $url = "https://graph.instagram.com/me/media?fields=media_url,username,permalink,timestamp,caption&access_token=".$token;
        $response = $this->request($url);
        $row = 1;

        if (array_key_exists('data', $response)) {
            foreach ($response['data'] as $item) {

                // on ne prend pas plus d'items que défini dans la channel
                if ($channel->getDataQuantity()) {
                    if ($row >= $channel->getDataQuantity()) {
                        continue;
                    }
                }

                // ne pas prendre le post si c'est une vidéo
                if (array_key_exists('permalink', $item) && !str_contains($item['permalink'], 'https://www.instagram.com/p/')) {
                    continue;
                }

                // enregistrer les données si elles ne sont pas encore présentes en BDD
                if (null === $this->instagramDataRepository->findOneBy(['instagramId' => $item['id']])) {
                    $data = new InstagramData();
                    $data->setInstagramId($item['id']);
                    $data->setUsername($item['username']);
                    $data->setCaption($this->stripEmojis($item['caption']));
                    $data->setPermalink($item['permalink']);
                    $data->setMediaUrl($item['media_url']);
                    $data->setTimestamp(new \DateTime($item['timestamp']));
                    $this->entityManager->persist($data);
                    $this->entityManager->flush();
                }
                $row++;
            }

            // supprimer les post instagrams les plus anciens s'ils dépassent la limite définie dans la channel
            if ($channel->getDataQuantity()) {
                $oldDatas = $this->instagramDataRepository->findOlderThanLimit($channel->getDataQuantity());

                /** @var InstagramData $oldData */
                foreach ($oldDatas as $oldData) {
                    $this->entityManager->remove($oldData);
                }
                if (count($oldDatas) > 0) {
                    $this->entityManager->flush();
                }
            }
        }

        return Command::SUCCESS;
    }

    private function request(string $url) : array
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $request = curl_exec($curl);
        curl_close($curl);

        if (!is_string($request)) {
            return  [];

        }

        return (array)json_decode($request, true);
    }

    private function stripEmojis(string $text): string
    {
        // retire les caractères > U+FFFF (astral plane)
        $text = preg_replace('/[\x{10000}-\x{10FFFF}]/u', '', $text);

        // retire les variation selectors et le zero-width-joiner éventuels
        $text = preg_replace('/[\x{FE00}-\x{FE0F}\x{200D}]/u', '', $text);

        // nettoie espaces multiples et trim
        $text = trim(preg_replace('/[ \t]{2,}/u', ' ', $text));

        return $text;
    }
}
