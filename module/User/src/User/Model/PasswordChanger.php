<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/7/14
 * Time: 5:01 PM
 */

namespace User\Model;


use User\Entity\User;

class PasswordChanger
{
    /**
     * Users Repository
     *
     * @var UsersRepository
     */
    private $usersRepository;

    /**
     * @param UsersRepository $usersRepository
     */
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * Change User password
     *
     * @param User $user
     * @param string $newPass
     */
    public function changeUserPassword(User $user, $newPass)
    {
        $user->setPassword(sha1($newPass));
        $this->usersRepository->update($user);
    }
} 