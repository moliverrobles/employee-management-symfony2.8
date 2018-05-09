<?php

namespace AppBundle\Form;
use AppBundle\Entity\Employee;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeAttendanceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /*
            ->add('empId')
            */
            ->add('empId', EntityType::class, array(
            // looks for choices from this entity
            'class' => Employee::class,
            'placeholder' => 'Choose Employee',
            'choice_label' => 'fullName',)
            )
            ->add('timeIn', DateTimeType::class, array(
                    'widget' => 'single_text',
                    'data' => new \DateTime()
                ))
            ->add('timeOut', DateTimeType::class, array(
                    'widget' => 'single_text',
                    'data' => new \DateTime()
                ))
/*
            ->add('timeInSubmit', SubmitType::class, array('label' => 'timeIn'))
            ->add('timeOutSubmit', SubmitType::class, array('label' => 'timeOut'))
            */
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