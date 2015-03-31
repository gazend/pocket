<?php

namespace Image\Entity;

use User\Entity\User;
use Zend\Form\Annotation;
use Doctrine\ORM\Mapping as ORM;

/**
 * Images
 *
 * @ORM\Table(name="images")
 * @ORM\Entity(repositoryClass="Image\Model\ImagesRepository")
 */
class Image
{
    /**
     * @var integer
     *
     * @Annotation\Exclude()
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Image Author
     *
     * @Annotation\Type("Zend\Form\Element\Text")
     *
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Filter({"name": "StripTags"})
     *
     * @Annotation\Options({"label":"Name:",
     * "label_attributes":{"class":"col-sm-3 control-label"}})
     * @Annotation\Attributes(
     *  {"type":"text","required": true,"class": "form-control",
     *  "placeholder": "Name"})
     *
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=45, nullable=true)
     */
    private $author;

    /**
     * Image Country
     *
     * @Annotation\Type("Zend\Form\Element\Text")
     *
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Filter({"name": "StripTags"})
     *
     * @Annotation\Options({"label":"Country:",
     * "label_attributes":{"class":"col-sm-3 control-label"}})
     * @Annotation\Attributes(
     *  {"type":"text","required": false,"class": "form-control",
     *  "placeholder": "Country"})
     *
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=45, nullable=true)
     */
    private $country;

    /**
     * Image Occupation
     *
     * @Annotation\Type("Zend\Form\Element\Text")
     *
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Filter({"name": "StripTags"})
     *
     * @Annotation\Options({"label":"Occupation:",
     * "label_attributes":{"class":"col-sm-3 control-label"}})
     * @Annotation\Attributes(
     *  {"type":"text","required": true,"class": "form-control",
     *  "placeholder": "Occupation"})
     *
     * @var string
     *
     * @ORM\Column(name="occupation", type="string", length=45, nullable=true)
     */
    private $occupation;

    /**
     * Image description
     *
     * @Annotation\Type("Zend\Form\Element\Textarea")
     *
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Filter({"name":"StripTags"})
     *
     * @Annotation\Options({"label":"Description:",
     * "label_attributes":{"class":"col-sm-3 control-label"}})
     * @Annotation\Attributes(
     *  {"type":"textarea","required": false,"class": "form-control",
     *  "placeholder": "Description", "rows": 5, "cols": 10})
     *
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * Image Image
     *
     * @Annotation\Type("Zend\Form\Element\File")
     *
     * @Annotation\Required(true)
     * @Annotation\Validator({"name":"filesize", "options": {"max": "2097152"}})
     * @Annotation\Validator({"name": "fileextension", "options":{"extension": "png,jpg,jpeg,gif"}})
     * @Annotation\Filter({"name": "filerenameupload", "options": {"target": "public/img/images/image.jpg","randomize": true}})
     * @Annotation\Options({"label":"Image:", "label_attributes":{"class":"col-sm-3 control-label"}})
     * @Annotation\Attributes({"class": ""})
     *
     * @ORM\Column(name="image", type="string", length=100, nullable=true)
     */
    private $image;


    /**
     * Setter for $id
     *
     * @param int $id
     * @return Image Provides fluent interface
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Getter for $id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Setter for $image
     *
     * @param string $image
     * @return Image Provides fluent interface
     */
    public function setImage($image)
    {
        if (is_array($image)) {
            if (!empty($image['tmp_name'])) {
                $image = basename($image['tmp_name']);
            } else {
                return $this;
            }
        }
        $this->image = $image;
        return $this;
    }

    /**
     * Getter for $image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Setter for $description
     *
     * @param string $description
     * @return Image Provides fluent interface
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Getter for $description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Setter for $country
     *
     * @param string $country
     * @return Image Provides fluent interface
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Getter for $country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Setter for $author
     *
     * @param string $author
     * @return Image Provides fluent interface
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * Getter for $author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Setter for $occupation
     *
     * @param string $occupation
     * @return Image Provides fluent interface
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;
        return $this;
    }

    /**
     * Getter for $occupation
     *
     * @return string
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

}
