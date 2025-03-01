<?php

namespace App\Controller\Admin;

use App\Entity\Technicien;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TechnicienCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Technicien::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->OnlyOnIndex(),
            TextEditorField::new('description')->onlyOnForms(),
            ImageField::new('photo')
                ->setBasePath('/uploads/images')
                ->setUploadDir('public/uploads/images/')
            ,
            TextField::new('alt'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW)
            ;
    }
}
