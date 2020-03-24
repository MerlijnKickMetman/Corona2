<?php

namespace App\Form;

use App\Entity\FoodOrders;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FoodOrdersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Date')
            ->add('Persons')
            ->add('Price')
            ->add('Booking_id')
            ->add('Customer_id')
            ->add('Restaurant_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FoodOrders::class,
        ]);
    }
}
