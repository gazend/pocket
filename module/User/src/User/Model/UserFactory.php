<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/7/14
 * Time: 3:10 PM
 */

namespace User\Model;

use User\Entity\User;
use User\Form\Register;

class UserFactory
{
    /**
     * @param Register $registerForm
     * @return User
     */
    public function createNewUserFromForm(Register $registerForm)
    {
        if(!$registerForm->isValid()){
            return false;
        }
        $user = new User();
        $user->setName($registerForm->get('name')->getValue())
            ->setEmail($registerForm->get('email')->getValue())
            ->setPassword(sha1($registerForm->get('password')->getValue()));
        return $user;
    }
} 