<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/10/14
 * Time: 10:50 AM
 */

namespace Image\ServiceFactory\Form;


use Image\Form\UpdateImageFactory;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

class UpdateImageFactoryFactory implements FactoryInterface{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var HydratorInterface $hydrator */
        $hydrator = $serviceLocator->get('Image\ImageDoctrineHydrator');
        return new UpdateImageFactory($hydrator);
    }
}