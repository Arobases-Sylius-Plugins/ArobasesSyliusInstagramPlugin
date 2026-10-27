<?php

declare(strict_types=1);

namespace Arobases\SyliusInstagramPlugin\Entity;

use Arobases\SyliusInstagramPlugin\Repository\InstagramDataRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Sylius\Resource\Model\ResourceInterface;

#[ORM\Entity(repositoryClass: InstagramDataRepository::class)]
#[ORM\Table(name: 'arobases_instragram_data')]
class InstagramData implements ResourceInterface
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'caption', type: 'text', nullable: true, options: ['collation' => 'utf8mb4_unicode_ci'])]
    private ?string $caption;

    #[ORM\Column(name: 'permalink', type: 'string', length: 255, nullable: true)]
    private ?string $permalink;

    #[ORM\Column(name: 'username', type: 'string', length: 255, nullable: true)]
    private ?string $username;

    #[ORM\Column(name: 'media_url', type: 'text', nullable: true)]
    private ?string $media_url;

    #[ORM\Column(name: 'instagram_id', type: 'string', length: 255, nullable: true)]
    private ?string $instagramId;

    #[ORM\Column(name: 'timestamp', type: 'datetime', nullable: true)]
    private ?\DateTime $timestamp;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setCaption(?string $caption): void
    {
        $this->caption = $caption;
    }

    public function getPermalink(): ?string
    {
        return $this->permalink;
    }

    public function setPermalink(?string $permalink): void
    {
        $this->permalink = $permalink;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    public function getMediaUrl(): ?string
    {
        return $this->media_url;
    }

    public function setMediaUrl(?string $media_url): void
    {
        $this->media_url = $media_url;
    }

    public function getInstagramId(): ?string
    {
        return $this->instagramId;
    }

    public function setInstagramId(?string $instagramId): void
    {
        $this->instagramId = $instagramId;
    }

    public function getTimestamp(): ?\DateTime
    {
        return $this->timestamp;
    }

    public function setTimestamp(?\DateTime $timestamp): void
    {
        $this->timestamp = $timestamp;
    }
}
