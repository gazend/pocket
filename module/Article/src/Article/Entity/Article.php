<?php

namespace Article\Entity;

use User\Entity\User;
use Zend\Form\Annotation;
use Doctrine\ORM\Mapping as ORM;

/**
 * Articles
 *
 * @ORM\Table(name="articles")
 * @ORM\Entity(repositoryClass="Article\Model\ArticlesRepository")
 */
class Article
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
     * @var User
     *
     * @Annotation\Exclude()
     *
     * @ORM\ManyToOne(targetEntity="User\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userId", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * Article Title
     *
     * @Annotation\Type("Zend\Form\Element\Text")
     *
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Filter({"name": "StripTags"})
     *
     * @Annotation\Options({"label":"Article Title:",
     * "label_attributes":{"class":"col-sm-2 control-label"}})
     * @Annotation\Attributes(
     *  {"type":"text","required": true,"class": "form-control",
     *  "placeholder": "Article Title"})
     *
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=true)
     */
    private $title;

    /**
     * Article description
     *
     * @Annotation\Type("Zend\Form\Element\Textarea")
     *
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Filter({"name":"StripTags"})
     *
     * @Annotation\Options({"label":"Description:",
     * "label_attributes":{"class":"col-sm-2 control-label"}})
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
     * Article Text
     *
     * @Annotation\Type("Zend\Form\Element\Textarea")
     *
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Filter({"name":"StripTags", "options":
     * {"allowTags": {"a", "br", "b", "p", "strong", "i", "table", "tr", "td", "th", "tbody", "thead", "ul", "li", "ol"}}})
     *
     * @Annotation\Options({"label":"Article Text:",
     * "label_attributes":{"class":"col-sm-2 control-label"}})
     * @Annotation\Attributes(
     *  {"type":"textarea","required": false,"class": "form-control text-area",
     *  "placeholder": "Article Text"})
     *
     * @var string
     *
     * @ORM\Column(name="text", type="text", nullable=true)
     */
    private $text;

    /**
     * @var string
     *
     * Article Image
     *
     * @Annotation\Type("Zend\Form\Element\File")
     *
     * @Annotation\Required(false)
     * @Annotation\Validator({"name":"filesize", "options": {"max": "2097152"}})
     * @Annotation\Validator({"name": "fileextension", "options":{"extension": "png,jpg,jpeg,gif"}})
     * @Annotation\Filter({"name": "filerenameupload", "options": {"target": "public/img/articles/article.jpg","randomize": true}})
     * @Annotation\Options({"label":"Select Image:", "label_attributes":{"class":"col-sm-2 control-label"}})
     * @Annotation\Attributes({"class": ""})
     *
     * @ORM\Column(name="image", type="string", length=100, nullable=true)
     */
    private $image;


    /**
     * Setter for $id
     *
     * @param int $id
     * @return Article Provides fluent interface
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
     * @return Article Provides fluent interface
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
     * @return Article Provides fluent interface
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
     * Setter for $text
     *
     * @param string $text
     * @return Article Provides fluent interface
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Getter for $text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Setter for $title
     *
     * @param string $title
     * @return Article Provides fluent interface
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Getter for $title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Setter for $user
     *
     * @param User $user
     * @return Article Provides fluent interface
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Getter for $user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}
