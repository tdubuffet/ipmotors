<?php

namespace IPMotors\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller {

    public function usersListAction() {
        //access user manager services 

        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();


        return $this->render('IPMotorsUserBundle::list.html.twig', array('users' => $users));
    }

    public function promoteAdminAction($username) {

        $usermanip = $this->get('fos_user.util.user_manipulator');
        $usermanip->addRole($username, 'ROLE_ADMIN');

        return $this->redirect($this->generateUrl('ip_motors_users_list'));
    }

    public function demoteAdminAction($username) {

        $usermanip = $this->get('fos_user.util.user_manipulator');
        $usermanip->removeRole($username, 'ROLE_ADMIN');

        return $this->redirect($this->generateUrl('ip_motors_users_list'));
    }

}
