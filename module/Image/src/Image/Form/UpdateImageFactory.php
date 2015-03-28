<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/10/14
 * Time: 10:54 AM
 */

namespace Image\Form;

use Image\Entity\Image;
use Zend\Form\Annotation\AnnotationBuilder;
use Zend\Stdlib\Hydrator\HydratorInterface;

class UpdateImageFactory
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

    public function createUpdatedForm(Image $image)
    {
        $builder = new AnnotationBuilder();
        $form = $builder->createForm($image);
        $form->setHydrator($this->hydrator);
        $form->bind($image);
        return $form;
    }
} 