<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        /** @var ImagesRepository $imagesRepository */
        $imagesRepository = $this->serviceLocator->get('Image\Model\ImagesRepository');

        /** @var Form $form */
        $form = $this->serviceLocator->get('Image\Form\NewImage');
        $form->setAttribute('action', $this->url()->fromRoute('add-image'));

        return ['images' => $imagesRepository->listImages(),
                'form' => $form
               ];
    }

    public function loggedinAction()
    {
        return ['message' => 'Successfully Loggedin!'];
    }

    public function errorAction()
    {

    }
}
