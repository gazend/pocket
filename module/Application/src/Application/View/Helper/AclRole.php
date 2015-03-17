<?php
namespace Application\View\Helper;

use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Permissions\Acl\Role\GenericRole;
use Zend\View\Helper\AbstractHelper;

class AclRole extends AbstractHelper{

    /**
     * Authentication service
     *
     * @var \Zend\Authentication\AuthenticationServiceInterface
     */
    private $auth;

    public function __construct(AuthenticationServiceInterface $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @return GenericRole
     */
    public function __invoke()
    {
        return $this->auth->hasIdentity()
            ? new GenericRole('member') : new GenericRole('guest');
    }

} 