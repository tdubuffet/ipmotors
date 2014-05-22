<?php

namespace IPMotors\MarketingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MarketingType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('Exporter les mails', 'submit')
        ;
    }
    

    /**
     * @return string
     */
    public function getName()
    {
        return 'ipmotors_marketingbundle_marketing';
    }
}
