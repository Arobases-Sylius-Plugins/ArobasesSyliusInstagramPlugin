<?php

declare(strict_types=1);

namespace Arobases\SyliusInstagramPlugin\Model;

use Doctrine\ORM\Mapping as ORM;

trait ChannelTrait
{
    /**
     * @var ?string
     *
     * @ORM\Column(type="string", name="instagram_token")
     */
    private $instagramToken = null;

    /**
     * @return string|null
     */
    public function getInstagramToken(): string
    {
        return $this->instagramToken;
    }

    /**
     * @param string|null $instagramToken
     */
    public function setInstagramToken(string $instagramToken): void
    {
        $this->instagramToken = $instagramToken;
    }
}