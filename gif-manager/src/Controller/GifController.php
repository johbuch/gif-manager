<?php

namespace App\Controller;

use App\Repository\GifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="gif_")
 */
class GifController extends AbstractController
{
    /**
     * @Route("", name="index")
     */
    public function index(GifRepository $gifRepository, Request $request): Response
    {
        // dd($request->query->get('search'));
        $searchTerm = $request->query->get('search');

        return $this->render('gif/index.html.twig', [
            'gifs' => $gifRepository->findAllGifsOrderByDesc(),
            'filteredGifs' => $gifRepository->findGifsWithSearchBar($searchTerm),
        ]);
    }
}
