<?php


declare(strict_types=1);

namespace Arobases\SyliusInstagramPlugin\Form\Extension;

use Sylius\Bundle\ChannelBundle\Form\Type\ChannelType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Positive;

final class ChannelTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('instagramToken', TextType::class, [
            'label' => 'arobases.ui.instagram_token',
            'required' => false,
        ]);
        $builder->add('dataQuantity', IntegerType::class, [
            'label' => 'arobases.ui.instagram_data_quantity',
            'help' => 'arobases.ui.instagram_data_quantity_help',
            'required' => false,
            'constraints' => [new Positive(groups: ['sylius'])],
        ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [ChannelType::class];
    }

}