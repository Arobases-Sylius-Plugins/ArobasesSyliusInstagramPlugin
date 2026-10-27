<p align="center">
    <a href="https://sylius.com" target="_blank">
        <img src="https://demo.sylius.com/assets/shop/img/logo.png" />
    </a>
</p>

<h1 align="center">ArobasesSyliusInstagramPlugin</h1>

<p align="center">Provide Instagram Feed on Sylius.</p>


## Requirements

| Plugin version | Sylius | PHP |
| --- | --- | --- |
| 2.x | 2.3 | 8.3+ |
| 1.2.x | 1.14 | 8.1+ |
| 1.0.x - 1.1.x | 1.10 - 1.14 | 8.0+ |

## Installation

### Composer

```bash
composer require arobases/sylius-instagram-plugin:^2.0
 ```
### Use ChannelTrait and ChannelInterface:

The trait is mapped with attributes and annotations, so it works whatever the mapping type of your `App` entities.

```php
<?php

declare(strict_types=1);

namespace App\Entity\Channel;

use Arobases\SyliusInstagramPlugin\Model\ChannelInterface;
use Arobases\SyliusInstagramPlugin\Model\ChannelTrait;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Channel as BaseChannel;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_channel')]
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
```twig
{% include "@ArobasesSyliusInstagramPlugin/Instagram/_instagram.html.twig" with {'datas' : app_get_instagram_feed() } %}
```

Import config
```yaml
# config/packages/arobases_sylius_instagram.yaml
imports:
    - { resource: "@ArobasesSyliusInstagramPlugin/Resources/config/resources.yaml" }
```

Use the command line to save Instagram data
```bash
php bin/console arobases:get-data
```

The "Instagram Token" field is displayed in the "General" section of the channel form.

### Upgrade from 1.x (Sylius 1.14)

- the Instagram token field of the channel form is displayed by the plugin (Twig Hooks): remove it from your overridden channel form templates
- the field is no longer required
- `instagram.js` no longer uses jQuery (it still needs Swiper, loaded by your theme) and no longer initializes the unrelated `.swiper-avis` slider
- the unused `Arobases\SyliusInstagramPlugin\Twig\Instagram\Instagram` class (`src/Instagram/Instagram.php`) and the `jstolpe/instagram-graph-api-php-sdk` dependency are removed
