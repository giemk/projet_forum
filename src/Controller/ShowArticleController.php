<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowArticleController extends AbstractController
{
    /**
     * @Route("/show/article", name="article")
     */
    public function index(): Response
    {
        return $this->render('article/article.html.twig', [
            'controller_name' => 'ShowArticleController',
        ]);
    }
}
