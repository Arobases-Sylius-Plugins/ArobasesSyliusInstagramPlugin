<?php

declare(strict_types=1);

namespace Arobases\SyliusInstagramPlugin\Model;

interface ChannelInterface
{
    public function getInstagramToken(): ?string;
    public function setInstagramToken(?string $instagramToken): void;
    public function getUserId(): ?string;
    public function setUserId(?string $userId): void;
    public function getUsername(): ?string;
    public function setUsername(?string $username): void;
    public function setFaceBookAppSecret(?string $faceBookAppSecret): void;
    public function getFaceBookAppSecret(): ?string;
    public function setFaceBookAppId(?string $faceBookAppId): void;
    public function getFaceBookAppId(): ?string;
    public function getRedirectUrl(): ?string;
    public function setRedirectUrl(?string $redirectUrl): void;
}