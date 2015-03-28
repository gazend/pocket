<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/10/14
 * Time: 10:42 AM
 */

namespace Image\ServiceFactory\Form;


use Image\Entity\Image;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use User\Entity\User;
use Zend\Form\Annotation\AnnotationBuilder;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

class NewImageFactory implements FactoryInterface{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $builder = new AnnotationBuilder();
        $image = new Image();
        $form = $builder->createForm($image);

        /** @var HydratorInterface $hydrator */
        $hydrator = $serviceLocator->get('Image\ImageDoctrineHydrator');
        $form->setHydrator($hydrator);
        $form->bind($image);
        return $form;
    }
}