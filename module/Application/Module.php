<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Acl\Acl;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\View\Helper\Navigation;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $sm = $e->getApplication()->getServiceManager();
        /** @var AuthenticationServiceInterface $auth */
        $auth = $sm->get('auth');
        /** @var Navigation $navigation */
        $navigation = $sm->get('ViewHelperManager')->get('Navigation');
        /** @var Acl $acl */
        $acl = $sm->get('acl');
        $navigation->setAcl($acl);

        $role = 'guest';

        if ($auth->hasIdentity()) {
            $role = 'member';
        }

        $navigation->setRole($role);


        /** @var FlashMessenger $flashMessenger */
        $flashMessenger = $e->getApplication()->getServiceManager()
            ->get('ViewHelperManager')->get('FlashMessenger');
        $flashMessenger->setMessageOpenFormat('<div%s><p>')
            ->setMessageSeparatorString('</p><p>')
            ->setMessageCloseString('</p></div>');
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
