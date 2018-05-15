<?php

namespace AppBundle\Form;
use AppBundle\Entity\Employee;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditTimeInAndOutType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /*->add('timeIn', DateTimeType::class)
            ->add('timeOut', DateTimeType::class)*/
            ->add('numberOfEdits', HiddenType::class)
            ->add('timeInOutEdits', HiddenType::class)
            
            ->add('timeIn', DateTimeType::class, array(
                'widget' => 'single_text',
                'html5' => false,
                ))
            ->add('timeOut', DateTimeType::class, array(
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