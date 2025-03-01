<?php

namespace App\Controller\Admin;

use App\Entity\Boutique;
use App\Entity\BoutiquePhotos;
use App\Entity\Datas;
use App\Entity\Horaires;
use App\Entity\MentionsLegales;
use App\Entity\Paiements;
use App\Entity\PaiementsDatas;
use App\Entity\PolitiqueConfidentialite;
use App\Entity\ServiceAssistance;
use App\Entity\ServiceAssistanceDatas;
use App\Entity\ServiceAteliers;
use App\Entity\ServiceAteliersDatas;
use App\Entity\ServiceDepannage;
use App\Entity\ServiceDepannageDatas;
use App\Entity\Technicien;
use App\Entity\Valeurs;
use App\Entity\Ventes;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
#[IsGranted('ROLE_ADMIN')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(DatasCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Serrevis Informatique Back');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Infos générales', 'fas fa-list', Datas::class);

        yield MenuItem::section('Services & Tarifs');

        yield MenuItem::subMenu('Dépannage')
            ->setSubItems([
                MenuItem::linkToCrud('Entete', 'fas fa-list', ServiceDepannage::class),
                MenuItem::linkToCrud('Données', 'fas fa-list', ServiceDepannageDatas::class),
            ])
        ;

        yield MenuItem::subMenu('Ateliers de groupe')
            ->setSubItems([
                MenuItem::linkToCrud('Entete', 'fas fa-list', ServiceAteliers::class),
                MenuItem::linkToCrud('Données', 'fas fa-list', ServiceAteliersDatas::class),
            ])
        ;

        yield MenuItem::subMenu('Assistance bureautique')
            ->setSubItems([
                MenuItem::linkToCrud('Entete', 'fas fa-list', ServiceAssistance::class),
                MenuItem::linkToCrud('Données', 'fas fa-list', ServiceAssistanceDatas::class),
            ])
        ;

        yield MenuItem::section('Paiements');

        yield MenuItem::subMenu('En boutique')
            ->setSubItems([
                MenuItem::linkToCrud('Entete', 'fas fa-list', Paiements::class),
                MenuItem::linkToCrud('Données', 'fas fa-list', PaiementsDatas::class),
            ])
        ;

        yield MenuItem::section('Ventes');

        yield MenuItem::linkToCrud('Articles', 'fas fa-list', Ventes::class);

        yield MenuItem::section('A propos');

        yield MenuItem::subMenu('Boutique')
            ->setSubItems([
                MenuItem::linkToCrud('Description', 'fas fa-list', Boutique::class),
                MenuItem::linkToCrud('Photos', 'fas fa-list', BoutiquePhotos::class),
            ])
        ;
        yield MenuItem::linkToCrud('Technicien', 'fas fa-list', Technicien::class);
        yield MenuItem::linkToCrud('Valeurs', 'fas fa-list', Valeurs::class);

        yield MenuItem::section('');
        yield MenuItem::linkToCrud('Horaires', 'fas fa-list', Horaires::class);

        yield MenuItem::section('');
        yield MenuItem::linkToCrud('Mentions Legales', 'fas fa-list', MentionsLegales::class);
        yield MenuItem::linkToCrud('Politique de confidentialité', 'fas fa-list', PolitiqueConfidentialite::class);
    }
}
