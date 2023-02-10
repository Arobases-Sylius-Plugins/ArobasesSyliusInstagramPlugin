<?php


declare(strict_types=1);

namespace Arobases\SyliusInstagramPlugin\Twig\Instagram;

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

    private function request(string $url) : ?string
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $request = curl_exec($curl);
        curl_close($curl);

        if ($request) {
            $request = json_decode((string)$request, true);
        }

        return $request;
    }

    function refreshToken(string $token) :string {

        $token = $this->channelContext->getChannel()->getInstagramToken();

        $url = "https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=".$token;

        $data = $this->request($url);


        return $data['access_token'];

    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('app_get_instagram_feed', [$this, 'getInstagramFeed']),
        ];
    }

    public function getInstagramFeed() :array
    {
        if ($token = $this->channelContext->getChannel()->getInstagramToken()) {

            $token = $this->refreshToken($token);

            $url = "https://graph.instagram.com/me/media?fields=media_url,username,permalink,timestamp,caption&access_token=".$token;

            return $this->request($url)["data"];
        }
        else {
            return [];
        }
    }

}
