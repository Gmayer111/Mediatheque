<?php

namespace App\Controller\Admin;

use App\Entity\Book;
use App\Entity\Borrower;
use App\Entity\Staff;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Admin Mediatheque');
    }



    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Habitants', 'fas fa-user-shield', Borrower::class);
        yield MenuItem::linkToCrud('Employés', 'fas fa-user-shield', Staff::class);
        yield MenuItem::linkToCrud('Livres', 'fas fa-book', Book::class);
    }
}
