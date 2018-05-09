<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class EmployeeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, array('label' => 'First Name'))
            ->add('middleName', TextType::class, array('label' => 'Middle Name'))
            ->add('lastName', TextType::class, array('label' => 'Last Name'))
            ->add('gender', ChoiceType::class, array(
                    'choices'  =>array(
                        'placeholder' => 'Choose an option',
                        'Female' => 'Female',
                        'Male' => 'Male',),
                    )
                )
            ->add('status', ChoiceType::class, array(
                    'choices'  =>array(
                        'placeholder' => 'Choose an option',
                        'Single' => 'Single',
                        'Married' => 'Married',
                        'Dicorced' => 'Divorced',
                        'Widowed' => 'Widowed',),
                    )
                )
            ->add('address', TextType::class)   
            ->add('dob', BirthdayType::class, array(
                'widget' => 'single_text', 
                'label' => 'Birt Date',
                //'html5' => false
                )
            )


            ->add('dateEmployement', DateType::class, array(

                'widget' => 'single_text',
                'label' => 'Employement'
                )
            )

            /*->add('dob', TextType::class, array('label' => 'Birth Date'))
            ->add('dateEmployement', TextType::class, array('label' => 'Join Date'))*/
            /*->add('dob', BirthdayType::class, array(
                'placeholder'=> array(
                    'year' => 'Year', 
                    'month' => 'Month', 
                    'day' => 'Day',)
                    )
                )
            ->add('dateEmployement', BirthdayType::class, array(
                'placeholder'=> array(
                    'year' => 'Year', 
                    'month' => 'Month', 
                    'day' => 'Day',)
                    )
                )*/

            ->add('contactDetails', TextType::class, array('label' => 'Contact'))
            ->add('emergencyName', TextType::class, array('label' => 'Name:'))
            ->add('emergencyRelation', ChoiceType::class, array(
                    'choices'  =>array(
                        'placeholder' => 'Choose an option',
                        'Spouse' => 'Spouse',
                        'Sibling' => 'Sibling',
                        'Child' => 'Child',
                        'Parent' => 'Parent',
                        'Other' => 'Other',)
                    )
                )
            ->add('emergencyContact', TextType::class, array('label' => 'Contact'));

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Employee'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_employee';
    }


}
