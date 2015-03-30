<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/5/14
 * Time: 7:04 PM
 */

namespace User\Controller;

use DoctrineModule\Authentication\Adapter\ObjectRepository;
use User\Entity\User;
use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    public function loginAction()
    {
        /** @var \User\Form\Login $form */
        $form = $this->serviceLocator->get('User\Form\Login');

        if($this->request->isPost()) {

            $data = $this->getRequest()->getPost();
            $form->setData($data);

            if($form->isValid()) {
                /** @var \Zend\Authentication\AuthenticationService $authService */
                $authService = $this->serviceLocator->get('doctrine.authenticationservice.orm_default');

                /** @var ObjectRepository $adapter */
                $adapter = $authService->getAdapter();
                $adapter->setIdentityValue($form->get('email')->getValue());
                $adapter->setCredentialValue($form->get('password')->getValue());
                $authRes = $authService->authenticate();

                if($authRes->isValid()) {
                    $this->redirect()->toRoute('home');
                    $this->flashMessenger()->addSuccessMessage(
                        sprintf('Hello %s! Welcome to your Pocket site!',
                            $authService->getIdentity()->getName()));
                } else {
                    $this->flashMessenger()->addErrorMessage('Wrong username or password!');
                    return ['form' => $form, 'isValid' => false];

                }

            }
        }
        $this->flashMessenger()->addErrorMessage('Wrong username or password!');
        return ['form' => $form];
    }

    public function registerAction()
    {
        /** @var \Zend\Form\Form $form */
       // $form = $this->serviceLocator->get('User\Form\Register');

        if($this->request->isPost()){
            $data = $this->getRequest()->getPost();
            $form->setData($data);
            if($form->isValid()){
                /** @var \User\Model\UserCreator $userCreator */
                $userCreator = $this->serviceLocator->get('User\Model\UserCreator');
                $userCreator->registerWithForm($form);
                $this->flashMessenger()->addSuccessMessage($form->get('name')->getValue().'Welcome to you Blog site!');
                return $this->redirect()->toRoute('images');

            }
        }
      //  return ['form' => $form];
    }

    public function passwordChangeAction()
    {
        /** @var \Zend\Authentication\AuthenticationService $authService */
        $authService = $this->serviceLocator->get('doctrine.authenticationservice.orm_default');
        $user = $authService->getIdentity();

        /** @var \Zend\Form\Form $form */
        $form = $this->serviceLocator->get('User\Form\PasswordChange');

        if($this->request->isPost()){
            $data = $this->getRequest()->getPost();
            $form->setData($data);
            if($form->isValid()){
                /** @var \User\Model\PasswordChanger $passwordChanger */
                $passwordChanger = $this->serviceLocator->get('User\Model\PasswordChanger');
                $passwordChanger->changeUserPassword($user, $form->get('new-password')->getValue());
                $this->flashMessenger()->addSuccessMessage('Password changed successfully!');
                return $this->redirect()->toRoute('images');

            }
            //var_dump($form->getMessages());die;
        }
        $this->flashMessenger()->addErrorMessage('Wrong data entered!');
        return ['form' => $form];
    }

    public function logoutAction()
    {
        /** @var \Zend\Authentication\AuthenticationService $authService */
        $authService = $this->serviceLocator->get('doctrine.authenticationservice.orm_default');
        $authService->clearIdentity();
        $this->flashMessenger()->addSuccessMessage('Logged out successfully!');
        return $this->redirect()->toRoute('login');


    }
} 