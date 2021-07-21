<?php

namespace App\Controller;

use App\Form\ArticleType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article/creer", name="creer_article")
     */
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ArticleType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();

            $em->persist($post);

            $em->flush();

            $this->addFlash('success', 'votre article a bien été enregistré.');

            return $this->redirectToRoute('article');
        }

        return $this->render('article/createArticle.html.twig', [
            'formArticle' => $form->createView()
        ]);
    }
}
