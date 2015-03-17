<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/10/14
 * Time: 10:42 AM
 */

namespace Article\ServiceFactory\Form;


use Article\Entity\Article;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Zend\Form\Annotation\AnnotationBuilder;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

class NewArticleFactory implements FactoryInterface{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $builder = new AnnotationBuilder();
        $article = new Article();
        $form = $builder->createForm($article);

        /** @var HydratorInterface $hydrator */
        $hydrator = $serviceLocator->get('Article\ArticleDoctrineHydrator');
        $form->setHydrator($hydrator);

        /** @var \User\Entity\User $user */
        $user = $serviceLocator->get('user');
        $article->setUser($user);
        $form->bind($article);
        return $form;
    }
}