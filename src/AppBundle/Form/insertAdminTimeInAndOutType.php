<?php

namespace AppBundle\Form;
use AppBundle\Entity\Employee;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class insertAdminTimeInAndOutType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder/*
            ->add('timeIn', DateTimeType::class)
            ->add('timeOut', DateTimeType::class)*/
            ->add('empId', EntityType::class, array(
            // looks for choices from this entity
            'class' => Employee::class,
            'placeholder' => 'Choose Employee',
            'choice_label' => 'fullName',)
            )
            ->add('timeIn', DateType::class, array(
                'widget' => 'single_text',
                'html5' => false,
                ))
            ->add('timeOut', DateType::class, array(
                'widget' => 'single_text',
                'html5' => false,
                ))
            ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\AttendanceRecords'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_attendancerecords';
    }


}