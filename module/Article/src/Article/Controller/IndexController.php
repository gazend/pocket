<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/8/14
 * Time: 2:06 PM
 */

namespace Article\Controller;


use Article\Entity\Article;
use Article\Model\ArticlesRepository;
use Zend\Form\Form;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Permissions\Acl\AclInterface;

class IndexController extends AbstractActionController
{
    public function listArticlesAction()
    {
        /** @var ArticlesRepository $articlesRepository */
        $articlesRepository = $this->serviceLocator->get('Article\Model\ArticlesRepository');
        return ['articles' => $articlesRepository->listArticles()];
    }

    public function readArticleAction()
    {
        /** @var ArticlesRepository $articlesRepository */
        $articlesRepository = $this->serviceLocator->get('Article\Model\ArticlesRepository');
        $article = $articlesRepository->findById($this->params()->fromRoute('id'));

        if (null === $article) {
            $this->flashMessenger()->addErrorMessage('Article not found');
            return $this->redirect()->toRoute('error');
        }
        return ['article' => $article];

    }

    public function addArticleAction()
    {
        /** @var Form $form */
        $form = $this->serviceLocator->get('Article\Form\NewArticle');

        if($this->getRequest()->isPost()){
            $data = array_merge_recursive(
                $this->getRequest()->getPost()->toArray(),
                //Merge the Files also to the post data
                $this->getRequest()->getFiles()->toArray()
            );
            $form->setData($data);

            if($form->isValid()){
                /** @var Article $article */
                $article = $form->getObject();
                /** @var ArticlesRepository $articlesRepository */
                $articlesRepository = $this->serviceLocator->get('Article\Model\ArticlesRepository');
                $articlesRepository->save($article);
                $this->flashMessenger()->addSuccessMessage('Article added!');
                return $this->redirect()->toRoute('articles');
            }
        }
        return ['form' => $form];
    }

    public function updateArticleAction()
    {
        /** @var AclInterface $acl */
        $acl = $this->serviceLocator->get('acl');
        /** @var ArticlesRepository $articlesRepository */
        $articlesRepository = $this->serviceLocator->get('Article\Model\ArticlesRepository');
        $article = $articlesRepository->findById($this->params()->fromRoute('id'));

        if (null === $article) {
            $this->flashMessenger()->addErrorMessage('Article not found');
            return $this->redirect()->toRoute('error');
        }

        $articleResource = new \Application\Acl\Resource\Article($article);
        if (!$acl->isAllowed('member', $articleResource, 'edit')) {
            $this->flashMessenger()->addErrorMessage('Access denied');
            return $this->redirect()->toRoute('error');
        }

        /** @var \Article\Form\UpdateArticleFactory $updateFormFactory */
        $updateFormFactory = $this->serviceLocator->get('Article\Form\UpdateArticleFactory');
        $form = $updateFormFactory->createUpdatedForm($article);

        if ($this->request->isPost()) {
            $data = array_merge_recursive(
                $this->getRequest()->getPost()->toArray(),
                //Merge the Files also to the post data
                $this->getRequest()->getFiles()->toArray()
            );
            $form->setData($data);
            if ($form->isValid()) {
                /** @var Article $article */
                $article = $form->getObject();
                $articlesRepository->update($article);

                $this->flashMessenger()->addSuccessMessage('Article updated!');
                return $this->redirect()->toRoute('update-article', ['id' => $article->getId()]);
            }
        }


        return ['form' => $form];
    }

    public function deleteArticleAction()
    {
        /** @var AclInterface $acl */
        $acl = $this->serviceLocator->get('acl');
        /** @var ArticlesRepository $articlesRepository */
        $articlesRepository = $this->serviceLocator->get('Article\Model\ArticlesRepository');
        $article = $articlesRepository->findById($this->params()->fromRoute('id'));

        if (null === $article) {
            $this->flashMessenger()->addErrorMessage('Article not found');
            return $this->redirect()->toRoute('error');
        }

        $articleResource = new \Application\Acl\Resource\Article($article);
        if (!$acl->isAllowed('member', $articleResource, 'delete')) {
            $this->flashMessenger()->addErrorMessage('Access denied');
            return $this->redirect()->toRoute('error');
        }

        $this->flashMessenger()->addSuccessMessage('Article "' . $article->getTitle() . '" removed!');
        $articlesRepository->delete($article);
        return $this->redirect()->toRoute('articles');
    }

} 