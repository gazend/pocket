<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/9/14
 * Time: 8:05 PM
 */

namespace Application\Acl\Resource;


use Article\Entity\Article as ArticleEntity;
use Zend\Permissions\Acl\Resource\ResourceInterface;

class Article implements ResourceInterface
{

    /**
     * @var ArticleEntity
     */
    private $article;

    /**
     * @param ArticleEntity $article
     */
    public function __construct(ArticleEntity $article)
    {
        $this->article = $article;
    }

    /**
     * Returns the string identifier of the Resource
     *
     * @return string
     */
    public function getResourceId()
    {
        return 'articles';
    }

    /**
     * Setter for $article
     *
     * @param ArticleEntity $article
     * @return Article Provides fluent interface
     */
    public function setArticle(ArticleEntity $article)
    {
        $this->article = $article;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasArticle()
    {
        return !empty($this->article);
    }

    /**
     * Getter for $article
     *
     * @return ArticleEntity
     */
    public function getArticle()
    {
        return $this->article;
    }


}