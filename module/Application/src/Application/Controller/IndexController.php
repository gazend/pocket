<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Image\Model\ImagesRepository;
use Zend\Form\Form;
use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        /** @var ImagesRepository $imagesRepository */
        $imagesRepository = $this->serviceLocator->get('Image\Model\ImagesRepository');

        /** @var Form $form */
        $form = $this->serviceLocator->get('Image\Form\NewImage');
        $form->setAttribute('action', $this->url()->fromRoute('add-image'));

        $response = [
            'images' => $imagesRepository->listImages(),
            'form' => $form,
        ];

        $isPhotoViewMode = (boolean) $this->params()->fromRoute('view-photo', false);

        if ($isPhotoViewMode) {
            $imageId = $this->params()->fromRoute('id');
            $response['imageId'] = $imageId;
        }

        return $response;
    }

    public function loggedinAction()
    {
        return ['message' => 'Successfully Loggedin!'];
    }

    public function errorAction()
    {

    }
}
