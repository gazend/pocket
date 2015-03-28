<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/9/14
 * Time: 8:05 PM
 */

namespace Application\Acl\Resource;


use Image\Entity\Image as ImageEntity;
use Zend\Permissions\Acl\Resource\ResourceInterface;

class Image implements ResourceInterface
{

    /**
     * @var ImageEntity
     */
    private $image;

    /**
     * @param ImageEntity $image
     */
    public function __construct(ImageEntity $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the string identifier of the Resource
     *
     * @return string
     */
    public function getResourceId()
    {
        return 'images';
    }

    /**
     * Setter for $image
     *
     * @param ImageEntity $image
     * @return Image Provides fluent interface
     */
    public function setImage(ImageEntity $image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasImage()
    {
        return !empty($this->image);
    }

    /**
     * Getter for $image
     *
     * @return ImageEntity
     */
    public function getImage()
    {
        return $this->image;
    }


}