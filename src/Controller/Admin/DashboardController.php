<?php

namespace App\Controller\Admin;

use App\Entity\Film;
use App\Entity\User;
use App\Entity\Cinema;
use App\Entity\Categorie;
use App\Entity\Publicite;
use App\Entity\Reservation;
use App\Entity\SalleDeProjection;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/login", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Cinhub');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Film', 'fas fa-list', Film::class);
        yield MenuItem::linkToCrud('Users', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Publicite', 'fas fa-list', Publicite::class);
        yield MenuItem::linkToCrud('cinema', 'fas fa-list', Cinema::class);
        yield MenuItem::linkToCrud('salle de projection', 'fas fa-list', SalleDeProjection::class);
        yield MenuItem::linkToCrud('reservation', 'fas fa-list', Reservation::class);
        yield MenuItem::linkToCrud('categorie', 'fas fa-list', Categorie::class);
    }
}
