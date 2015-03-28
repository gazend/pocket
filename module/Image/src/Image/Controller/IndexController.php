<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/8/14
 * Time: 2:06 PM
 */

namespace Image\Controller;


use Image\Entity\Image;
use Image\Model\ImagesRepository;
use Zend\Form\Form;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Permissions\Acl\AclInterface;

class IndexController extends AbstractActionController
{
    public function listImagesAction()
    {
        /** @var ImagesRepository $imagesRepository */
        $imagesRepository = $this->serviceLocator->get('Image\Model\ImagesRepository');
        return ['images' => $imagesRepository->listImages()];
    }

    public function readImageAction()
    {
        /** @var ImagesRepository $imagesRepository */
        $imagesRepository = $this->serviceLocator->get('Image\Model\ImagesRepository');
        $image = $imagesRepository->findById($this->params()->fromRoute('id'));

        if (null === $image) {
            $this->flashMessenger()->addErrorMessage('Image not found');
            return $this->redirect()->toRoute('error');
        }
        return ['image' => $image];

    }

    public function addImageAction()
    {
        /** @var Form $form */
        $form = $this->serviceLocator->get('Image\Form\NewImage');

        if($this->getRequest()->isPost()){
            $data = array_merge_recursive(
                $this->getRequest()->getPost()->toArray(),
                //Merge the Files also to the post data
                $this->getRequest()->getFiles()->toArray()
            );
            $form->setData($data);

            if($form->isValid()){
                /** @var Image $image */
                $image = $form->getObject();
                /** @var ImagesRepository $imagesRepository */
                $imagesRepository = $this->serviceLocator->get('Image\Model\ImagesRepository');
                $imagesRepository->save($image);
                $this->flashMessenger()->addSuccessMessage('Image added!');
                return $this->redirect()->toRoute('home');
            }
        }
        return ['form' => $form];
    }

    public function updateImageAction()
    {
        /** @var AclInterface $acl */
        $acl = $this->serviceLocator->get('acl');
        /** @var ImagesRepository $imagesRepository */
        $imagesRepository = $this->serviceLocator->get('Image\Model\ImagesRepository');
        $image = $imagesRepository->findById($this->params()->fromRoute('id'));

        if (null === $image) {
            $this->flashMessenger()->addErrorMessage('Image not found');
            return $this->redirect()->toRoute('error');
        }

        $imageResource = new \Application\Acl\Resource\Image($image);
        if (!$acl->isAllowed('member', $imageResource, 'edit')) {
            $this->flashMessenger()->addErrorMessage('Access denied');
            return $this->redirect()->toRoute('error');
        }

        /** @var \Image\Form\UpdateImageFactory $updateFormFactory */
        $updateFormFactory = $this->serviceLocator->get('Image\Form\UpdateImageFactory');
        $form = $updateFormFactory->createUpdatedForm($image);

        if ($this->request->isPost()) {
            $data = array_merge_recursive(
                $this->getRequest()->getPost()->toArray(),
                //Merge the Files also to the post data
                $this->getRequest()->getFiles()->toArray()
            );
            $form->setData($data);
            if ($form->isValid()) {
                /** @var Image $image */
                $image = $form->getObject();
                $imagesRepository->update($image);

                $this->flashMessenger()->addSuccessMessage('Image updated!');
                return $this->redirect()->toRoute('update-image', ['id' => $image->getId()]);
            }
        }


        return ['form' => $form];
    }

    public function deleteImageAction()
    {
        /** @var AclInterface $acl */
        $acl = $this->serviceLocator->get('acl');
        /** @var ImagesRepository $imagesRepository */
        $imagesRepository = $this->serviceLocator->get('Image\Model\ImagesRepository');
        $image = $imagesRepository->findById($this->params()->fromRoute('id'));

        if (null === $image) {
            $this->flashMessenger()->addErrorMessage('Image not found');
            return $this->redirect()->toRoute('error');
        }

        $imageResource = new \Application\Acl\Resource\Image($image);
        if (!$acl->isAllowed('member', $imageResource, 'delete')) {
            $this->flashMessenger()->addErrorMessage('Access denied');
            return $this->redirect()->toRoute('error');
        }

        $this->flashMessenger()->addSuccessMessage('Image "' . $image->getTitle() . '" removed!');
        $imagesRepository->delete($image);
        return $this->redirect()->toRoute('images');
    }

} 