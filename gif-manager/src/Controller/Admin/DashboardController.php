<?php

namespace App\Controller\Admin;

use App\Entity\Gif;
use App\Entity\Tag;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
//        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();
//        return $this->redirect($routeBuilder->setController(GifCrudController::class)->generateUrl());

    }

    public function configureAssets(): Assets
    {
        return Assets::new()->addCssFile('build/admin.css')->addJsFile('build/admin.js');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Admininistration du Gif Manager');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Gif', 'fas fa-list', Gif::class);
        yield MenuItem::linkToCrud('Tags', 'fas fa-tags', Tag::class);

        yield MenuItem::section('Site');
        yield MenuItem::linktoRoute('Le site', 'fas fa-tv', 'index');

        yield MenuItem::section('Déconnexion');
        yield MenuItem::linkToLogout('Se déconnecter', 'fas fa-sign-out-alt');
    }
}
