<?php

namespace App\Form;

use App\Entity\Booking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Duration')
            ->add('Num_of_guests')
            ->add('Start_date')
            ->add('Comments')
            ->add('Total_price')
            ->add('Is_paid')
            ->add('Payment_type')
            ->add('Payment_date')
            ->add('Customer_id')
            ->add('Room_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
