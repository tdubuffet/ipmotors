<?php

namespace IPMotors\UserBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends BaseType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('name');
        $builder->add('surname');
        $builder->add('email');
        parent::buildForm($builder, $options);
    }

    public function getName() {
        return 'ipmotors_userbundle_user_registration';
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'IPMotors\UserBundle\Entity\User'
        ));
    }

}
