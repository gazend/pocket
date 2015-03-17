<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/10/14
 * Time: 10:54 AM
 */

namespace Article\Form;

use Article\Entity\Article;
use Zend\Form\Annotation\AnnotationBuilder;
use Zend\Stdlib\Hydrator\HydratorInterface;

class UpdateArticleFactory
{
    /**
     * Hydrator
     *
     * @var \Zend\Stdlib\Hydrator\HydratorInterface
     */
    private $hydrator;

    public function __construct(HydratorInterface $hydrator)
    {
        $this->hydrator = $hydrator;
    }

    public function createUpdatedForm(Article $article)
    {
        $builder = new AnnotationBuilder();
        $form = $builder->createForm($article);
        $form->setHydrator($this->hydrator);
        $form->bind($article);
        return $form;
    }
} 