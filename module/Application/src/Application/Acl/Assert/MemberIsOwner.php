<?php

namespace Application\Acl\Assert;

use Application\Acl\Resource\Image;
use User\Entity\User;
use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Assertion\AssertionInterface;
use Zend\Permissions\Acl\Resource\ResourceInterface;
use Zend\Permissions\Acl\Role\RoleInterface;

class MemberIsOwner implements AssertionInterface
{

    /**
     * @var User
     */
    private $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {

        $this->user = $user;
    }

    /**
     * Returns true if and only if the assertion conditions are met
     *
     * This method is passed the ACL, Role, Resource, and privilege to which the authorization query applies. If the
     * $role, $resource, or $privilege parameters are null, it means that the query applies to all Roles, Resources, or
     * privileges, respectively.
     *
     * @param  Acl $acl
     * @param  RoleInterface $role
     * @param  ResourceInterface $resource
     * @param  string $privilege
     * @return bool
     */
    public function assert(Acl $acl, RoleInterface $role = null, ResourceInterface $resource = null, $privilege = null)
    {
        if (in_array($privilege, ['read', 'add'])) {
            return true;
        }

        if (!$resource instanceof Image) {
            return false;
        }

        if (!$resource->hasImage()) {
            return false;
        }

        $image = $resource->getImage();

        if ($this->user->getId()) {
            return true;
        }

        return false;
    }
}