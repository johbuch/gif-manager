<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function index(): Response
    {
        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }

    /**
     * create the search form for the header
     */
    public function searchForm()
    {
        $form = $this->createFormBuilder(null)
            ->add('query', TextType::class, [
                'attr' => [
                    'class' => 'form-control mr-sm-2',
                ]
            ])
            ->add('search', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-secondary my-2 my-sm-0',
                ]
            ])
            ->getForm();

        return $this->render('search/searchForm.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
