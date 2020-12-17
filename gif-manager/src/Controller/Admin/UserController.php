<?php

namespace App\Controller\Admin;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/user", name="admin_user_")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/browse", name="browse")
     */
    public function browse(UserRepository $userRepository, $user): Response
    {
        $user = "test";
        return $this->render('admin/user/browse.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }


}
