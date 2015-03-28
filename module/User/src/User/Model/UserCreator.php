<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/7/14
 * Time: 3:25 PM
 */

namespace User\Model;


use User\Form\Register;

class UserCreator
{
    /**
     * @var UsersRepository
     */
    private $usersRepository;

    /**
     * @var UserFactory
     */
    private $userFactory;

    /**
     * Constructor Sets Dependencies
     *
     * @param UsersRepository $usersRepository
     * @param UserFactory $userFactory
     */
    public function __construct(UsersRepository $usersRepository, UserFactory $userFactory)
    {
        $this->userFactory = $userFactory;
        $this->usersRepository = $usersRepository;
    }

    public function registerWithForm(Register $registerForm)
    {
        $user = $this->userFactory->createNewUserFromForm($registerForm);
        $this->usersRepository->save($user);
        return $this;

    }
} 