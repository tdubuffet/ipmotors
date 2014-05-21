<?php

namespace IPMotors\FormEditBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SurveyType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('actualVehiculName')
            ->add('actualVehiculStrenghs')
            ->add('futurVehiculName')
            ->add('futurVehiculStrenghs')
            ->add('date')
            ->add('activated')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IPMotors\FormEditBundle\Entity\Survey',
            'csrf_protection' => false
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ipmotors_formeditbundle_survey';
    }
}
