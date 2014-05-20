<?php

namespace IPMotors\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\Entity\User;
use IPMotors\UserBundle\Form\UserType;
use IPMotors\UserBundle\Form\UserProfile;

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

    public function activateUserAction($username) {

        $usermanip = $this->get('fos_user.util.user_manipulator');
        $usermanip->activate($username);

        return $this->redirect($this->generateUrl('ip_motors_users_list'));
    }

    public function desactivateUserAction($username) {

        $usermanip = $this->get('fos_user.util.user_manipulator');
        $usermanip->deactivate($username);

        return $this->redirect($this->generateUrl('ip_motors_users_list'));
    }

    public function editUserAction($id) {


        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('IPMotorsUserBundle:User')->find($id);


        $form = $this->createForm(new UserProfile('IPMotorsUserBundle:User'), $user);
        $request = $this->getRequest();
        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'L\'utilisateur a été modifié');
                return $this->redirect($this->generateUrl('ip_motors_users_list', array()));
            }
        }


        return $this->render('IPMotorsUserBundle::edit.html.twig', array(
                    'user' => $user,
                    'form' => $form->createView()
        ));
    }

}
