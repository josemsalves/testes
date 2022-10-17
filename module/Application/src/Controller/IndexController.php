<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Form\UpdateBlogPostForm;
use Doctrine\ORM\EntityManager;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function indexAction()
    {
        $form = new UpdateBlogPostForm($this->entityManager);

        $blogPost = $this->entityManager->getRepository(\Application\Entity\BlogPost::class)->findAll();
        $form->bind($blogPost[0]);

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                // Save the changes
                //$objectManager->flush();
            }
        }

        return new ViewModel([
            'form' => $form,
        ]);
    }
}
