<?php


declare(strict_types=1);

namespace Arobases\SyliusInstagramPlugin\Twig\Instagram;

use Instagram\User\BusinessDiscovery;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Twig\Extension\AbstractExtension;
use Instagram\AccessToken\AccessToken;

final class Instagram extends AbstractExtension
{
    private ChannelContextInterface $channelContext;
    private array $config;

    public function __construct(ChannelContextInterface $channelContext)
    {
        $this->channelContext = $channelContext;

        $config = [// instantiation config params
            'app_id' => $this->channelContext->getChannel()->getFaceBookAppId(),
            'app_secret' => $this->channelContext->getChannel()->getFaceBookAppSecret(),
        ];
    }

    private function getPosts() : \Instagram\Instagram
    {
        $redirectUri = $this->channelContext->getChannel()->getRedirectUrl();

        $accessToken = new AccessToken($this->config);

        /** @var \Instagram\Instagram $newToken */
        $newToken = $accessToken->getAccessTokenFromCode( $_GET['code'], $redirectUri );

        if ( !$accessToken->isLongLived() ) {
            $newToken = $accessToken->getLongLivedAccessToken( $newToken['access_token'] );
        }
        $this->config['access_token'] = $newToken;

        $businessDiscovery = new BusinessDiscovery( $this->config );

        return $userBusinessDiscovery = $businessDiscovery->getSelf();

    }
}
