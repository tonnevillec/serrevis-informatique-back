<?php

namespace App\Controller\Admin;

use App\Entity\ServiceDepannageDatas;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ServiceDepannageDatasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ServiceDepannageDatas::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('parent'),
            TextField::new('titre'),
            TextEditorField::new('description')->onlyOnForms(),
            TextField::new('valeur'),
            TextField::new('position'),
        ];
    }
}
