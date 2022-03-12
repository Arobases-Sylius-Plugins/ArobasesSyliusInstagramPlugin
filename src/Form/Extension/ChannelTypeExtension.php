<?php


declare(strict_types=1);

namespace Arobases\SyliusInstagramPlugin\Form\Extension;

use Sylius\Bundle\ChannelBundle\Form\Type\ChannelType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class ChannelTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('instagramToken', TextType::class, [
            'label' => 'arobases.ui.instagramToken',
        ]);
    }

    public static function getExtendedTypes(): array
    {
        return [ChannelType::class];
    }

}