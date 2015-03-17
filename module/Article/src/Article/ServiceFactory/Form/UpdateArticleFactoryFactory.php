<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/10/14
 * Time: 10:50 AM
 */

namespace Article\ServiceFactory\Form;


use Article\Form\UpdateArticleFactory;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

class UpdateArticleFactoryFactory implements FactoryInterface{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var HydratorInterface $hydrator */
        $hydrator = $serviceLocator->get('Article\ArticleDoctrineHydrator');
        return new UpdateArticleFactory($hydrator);
    }
}