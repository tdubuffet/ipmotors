<?php

namespace IPMotors\MailBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TestMailType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('expeditor', 'email')
        ;
    }

    /**
     * @return string
     */
    public function getName() {
        return 'ipmotors_mailbundle_test_mail';
    }

}
