<?php

declare(strict_types=1);

namespace Arobases\SyliusInstagramPlugin\Twig\Instagram;

use Arobases\SyliusInstagramPlugin\Model\ChannelInterface;
use Arobases\SyliusInstagramPlugin\Repository\InstagramDataRepository;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class InstagramExtension extends AbstractExtension
{

    public function __construct(private ChannelContextInterface $channelContext, private InstagramDataRepository $instagramDataRepository)
    {
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

        return $this->instagramDataRepository->findBy([], ['timestamp' => 'ASC']);
    }
}
