<?php

namespace Image\Model;

use Image\Entity\Image;
use Doctrine\ORM\EntityRepository;
use User\Entity\User;

class ImagesRepository extends EntityRepository
{

    /**
     * Find image by ID
     *
     * @param integer $id
     * @return Image|null
     */
    public function findById($id)
    {
        return $this->findOneBy(['id' => $id]);
    }

    /**
     * Saves new entity
     *
     * @param Image $image
     * @return $this
     */
    public function save(Image $image)
    {
        $this->_em->persist($image);
        $this->_em->flush($image);
        return $this;
    }

    /**
     * Update detached entity
     *
     * @param Image $image
     * @return $this
     */
    public function update(Image $image)
    {
        $this->_em->merge($image);
        $this->_em->flush();
        return $this;
    }

    /**
     * @param Image $image
     * @return $this
     */
    public function delete(Image $image)
    {
        $this->_em->remove($image);
        $this->_em->flush($image);
        return $this;
    }

    /**
     * @return Image[]
     */
    public function listImages()
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