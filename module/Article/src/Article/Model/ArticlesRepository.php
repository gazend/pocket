<?php

namespace Article\Model;

use Article\Entity\Article;
use Doctrine\ORM\EntityRepository;
use User\Entity\User;

class ArticlesRepository extends EntityRepository
{

    /**
     * Find article by ID
     *
     * @param integer $id
     * @return Article|null
     */
    public function findById($id)
    {
        return $this->findOneBy(['id' => $id]);
    }

    /**
     * Saves new entity
     *
     * @param Article $article
     * @return $this
     */
    public function save(Article $article)
    {
        $this->_em->persist($article);
        $this->_em->flush($article);
        return $this;
    }

    /**
     * Update detached entity
     *
     * @param Article $article
     * @return $this
     */
    public function update(Article $article)
    {
        $this->_em->merge($article);
        $this->_em->flush();
        return $this;
    }

    /**
     * @param Article $article
     * @return $this
     */
    public function delete(Article $article)
    {
        $this->_em->remove($article);
        $this->_em->flush($article);
        return $this;
    }

    /**
     * @return Article[]
     */
    public function listArticles()
    {
        return $this->findBy([],['id'=> 'DESC']);
    }

    /**
     * @param User $user
     * @return array
     */
    public function listByUser(User $user)
    {
        return $this->findBy(['user' => $user], ['id'=> 'DESC']);
    }

} 