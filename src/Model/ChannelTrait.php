<?php

declare(strict_types=1);

namespace Arobases\SyliusInstagramPlugin\Model;

use Doctrine\ORM\Mapping as ORM;

trait ChannelTrait
{
    /**
     * Annotations are kept for applications still mapping their entities with annotations.
     *
     * @ORM\Column(name="instagram_token", type="string", nullable=true)
     */
    #[ORM\Column(name: 'instagram_token', type: 'string', nullable: true)]
    protected ?string $instagramToken = null;

    /**
     * @ORM\Column(name="user_id", type="string", nullable=true)
     */
    #[ORM\Column(name: 'user_id', type: 'string', nullable: true)]
    protected ?string $userId = null;

    /**
     * @ORM\Column(name="facebook_app_id", type="string", nullable=true)
     */
    #[ORM\Column(name: 'facebook_app_id', type: 'string', nullable: true)]
    protected ?string $faceBookAppId = null;

    /**
     * @ORM\Column(name="facebook_app_secret", type="string", nullable=true)
     */
    #[ORM\Column(name: 'facebook_app_secret', type: 'string', nullable: true)]
    protected ?string $faceBookAppSecret = null;

    /**
     * @ORM\Column(name="redirect_url", type="string", nullable=true)
     */
    #[ORM\Column(name: 'redirect_url', type: 'string', nullable: true)]
    protected ?string $redirectUrl = null;

    /**
     * @ORM\Column(name="username", type="string", nullable=true)
     */
    #[ORM\Column(name: 'username', type: 'string', nullable: true)]
    protected ?string $username = null;

    /**
     * @ORM\Column(name="data_quantity", type="integer", nullable=true)
     * Nombre de posts instagram à enregistrer
     */
    #[ORM\Column(name: 'data_quantity', type: 'integer', nullable: true)]
    protected ?int $dataQuantity = null;

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

    public function getDataQuantity(): ?int
    {
        return $this->dataQuantity;
    }

    public function setDataQuantity(?int $dataQuantity): void
    {
        $this->dataQuantity = $dataQuantity;
    }
}

