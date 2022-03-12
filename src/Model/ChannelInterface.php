<?php

// src/Model/ProductVariantInterface.php

declare(strict_types=1);

namespace Arobases\SyliusInstagramPlugin\Model;

interface ChannelInterface
{
    public function getInstagramToken(): string;

    public function setInstagramToken(string  $instagramToken): void;
}