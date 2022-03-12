<?php

declare(strict_types=1);

namespace Tests\Arobases\SyliusInstagramPlugin\Entity\Channel;

use Arobases\SyliusInstagramPlugin\Model\ChannelInterface;
use Arobases\SyliusInstagramPlugin\Model\ChannelTrait;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Channel as BaseChannel;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_channel")
 */
class Channel extends BaseChannel implements ChannelInterface
{
    use ChannelTrait;
}
