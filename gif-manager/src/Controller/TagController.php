<?php

namespace App\Controller;

use App\Entity\Tag;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tag", name="tag_")
 */
class TagController extends AbstractController
{
    /**
     * @Route("", name="browse")
     */
    public function browse(TagRepository $tags): Response
    {
        return $this->render('tag/browse.html.twig', [
            'tags' => $tags->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="read", methods="GET", requirements={"id": "\d+"})
     */
    public function read(Tag $tag): Response
    {
        return $this->render('tag/read.html.twig', [
            'tag' => $tag,
        ]);
    }

}
