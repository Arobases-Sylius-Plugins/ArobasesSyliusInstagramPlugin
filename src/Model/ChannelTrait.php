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
     * @ORM\Column(name="user_id", type="string", nullable=true)
     */
    protected ?string $userId = null;

    /**
     * @ORM\Column(name="facebook_app_id", type="string", nullable=true)
     */
    protected ?string $faceBookAppId = null;

    /**
     * @ORM\Column(name="facebook_app_secret", type="string", nullable=true)
     */
    protected ?string $faceBookAppSecret = null;

    /**
     * @ORM\Column(name="redirect_url", type="string", nullable=true)
     */
    protected ?string $redirectUrl = null;

    /**
     * @ORM\Column(name="username", type="string", nullable=true)
     */
    protected ?string $username = null;

    public function getInstagramToken(): ?string
    {
        return $this->instagramToken;
    }

    public function setInstagramToken(?string $instagramToken): void
    {
        $this->instagramToken = $instagramToken;
    }

    public function getUserId(): ?string
    {
        return $this->userId;
    }

    public function setUserId(?string $userId): void
    {
        $this->userId = $userId;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    public function getFaceBookAppId(): ?string
    {
        return $this->faceBookAppId;
    }

    public function setFaceBookAppId(?string $faceBookAppId): void
    {
        $this->faceBookAppId = $faceBookAppId;
    }

    public function getFaceBookAppSecret(): ?string
    {
        return $this->faceBookAppSecret;
    }

    public function setFaceBookAppSecret(?string $faceBookAppSecret): void
    {
        $this->faceBookAppSecret = $faceBookAppSecret;
    }

    public function getRedirectUrl(): ?string
    {
        return $this->redirectUrl;
    }

    public function setRedirectUrl(?string $redirectUrl): void
    {
        $this->redirectUrl = $redirectUrl;
    }
}

