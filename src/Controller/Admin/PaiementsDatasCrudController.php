<?php

namespace App\Controller\Admin;

use App\Entity\PaiementsDatas;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PaiementsDatasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PaiementsDatas::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('parent'),
            TextField::new('titre'),
            TextField::new('description')->onlyOnForms(),
            TextField::new('position'),
        ];
    }
}
