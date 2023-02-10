<?php

declare(strict_types=1);

namespace Arobases\SyliusInstagramPlugin\Model;

use Doctrine\ORM\Mapping as ORM;

trait ChannelTrait
{

    /**
     * @ORM\Column(name="instagram_token", type="string", nullable=true)
     */
    protected ?string $instagramToken = null;

    /**
     * @return string|null
     */
    public function getInstagramToken(): ?string
    {
        return $this->instagramToken;
    }

    /**
     * @param  string|null  $instagramToken
     */
    public function setInstagramToken(?string $instagramToken): void
    {
        $this->instagramToken = $instagramToken;
    }

}