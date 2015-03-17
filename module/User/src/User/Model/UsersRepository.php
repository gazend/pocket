<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/6/14
 * Time: 10:17 PM
 */

namespace User\Model;


use Doctrine\ORM\EntityRepository;
use User\Entity\User;

class UsersRepository extends EntityRepository
{

    /**
     * Save user information to database
     *
     * @param User $user
     */
    public function save(User $user)
    {
        $this->_em->persist($user);
        $this->_em->flush($user);

    }

    /**
     * Entity update in DB
     *
     * @param User $user
     */
    public function update(User $user)
    {
        $this->_em->merge($user);
        $this->_em->flush($user);
    }


} 