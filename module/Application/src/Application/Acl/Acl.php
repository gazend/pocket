<?php

namespace Application\Acl;

use Application\Acl\Assert\MemberIsOwner;
use Zend\Permissions\Acl\Acl as ZendAcl;

class Acl extends ZendAcl
{

    /**
     * Constructor
     *
     * @param MemberIsOwner $memberIsOwnerAssert
     */
    public function __construct(MemberIsOwner $memberIsOwnerAssert = null)
    {
        $this->addRole('guest');
        $this->addRole('member');

        $this->addResource('home')
             ->addResource('login')
             ->addResource('logout')
             ->addResource('register')
             ->addResource('change_password')
             ->addResource('articles');

        $this->allow('guest', array('home', 'register', 'login'));
        $this->allow('guest', 'articles', 'read');

        $this->allow('member', array('home', 'logout', 'change_password'));
        $this->allow('member', 'articles', null, $memberIsOwnerAssert);
    }
}