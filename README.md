<p align="center">
    <a href="https://sylius.com" target="_blank">
        <img src="https://demo.sylius.com/assets/shop/img/logo.png" />
    </a>
</p>

<h1 align="center">ArobasesSyliusInstagramPlugin</h1>

<p align="center">Provide Instagram Feed on Sylius.</p>


## Installation

### Composer

```bash
composer require arobases-sylius-public/sylius-instagram-plugin
 ```
### Use ChannelTrait and ChannelInterface:

```php
<?php

declare(strict_types=1);

namespace App\Entity\Channel;

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

```
### Update the schema

```bash
php bin/console doctrine:schema:update --force
```

### Now you have access to an array representing the response of instagram

You can use it everywhere you want and render like you want  
```bash
{% include "@ArobasesSyliusInstagramPlugin/Instagram/_instagram.html.twig" with {'data' : app_get_instagram_feed() } %}
```
### To test it 
