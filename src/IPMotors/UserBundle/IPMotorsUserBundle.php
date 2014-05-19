<?php

namespace IPMotors\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class IPMotorsUserBundle extends Bundle {

    public function getParent() {
        return 'FOSUserBundle';
    }

}
