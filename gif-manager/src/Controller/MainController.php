<?php

namespace App\Controller;

use App\Repository\GifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(GifRepository $gifRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'gifs' => $gifRepository->findAll(),
        ]);
    }
}
