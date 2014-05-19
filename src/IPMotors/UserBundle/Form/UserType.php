<?php

namespace IPMotors\UserBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class UserType extends BaseType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('name');
        $builder->add('surname');
        parent::buildForm($builder, $options);
    }

    public function getName() {
        return 'ipmotors_userbundle_user_registration';
    }

}
