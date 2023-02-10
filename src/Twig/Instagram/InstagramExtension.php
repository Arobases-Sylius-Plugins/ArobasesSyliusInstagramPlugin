<?php


declare(strict_types=1);

namespace Arobases\SyliusInstagramPlugin\Twig\Instagram;

use Arobases\SyliusInstagramPlugin\Model\ChannelInterface;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


final class InstagramExtension extends AbstractExtension
{
    private ChannelContextInterface $channelContext;

    public function __construct(ChannelContextInterface $channelContext)
    {
        $this->channelContext = $channelContext;
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

    public function getFunctions(): array
    {
        return [
            new TwigFunction('app_get_instagram_feed', [$this, 'getInstagramFeed']),
        ];
    }

    public function getInstagramFeed() : array
    {
        /** @var ChannelInterface $channel */
        $channel = $this->channelContext->getChannel();

        $token = $channel->getInstagramToken();

        if ($token === null) {
            return [];
        }


        $url = "https://graph.instagram.com/me/media?fields=media_url,username,permalink,timestamp,caption&access_token=".$token;
        $response = $this->request($url);


        if (array_key_exists('data', $response)) {
            return["data"];
        }


        return [];

    }

}
