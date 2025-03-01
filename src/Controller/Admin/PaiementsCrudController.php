<?php

namespace App\Controller\Admin;

use App\Entity\Paiements;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PaiementsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Paiements::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('titre'),
            TextField::new('color'),
        ];
    }
}
