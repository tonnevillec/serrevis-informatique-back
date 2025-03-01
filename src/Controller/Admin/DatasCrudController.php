<?php

namespace App\Controller\Admin;

use App\Entity\Datas;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DatasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Datas::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            ImageField::new('logo')
                ->setBasePath('/uploads/images')
                ->setUploadDir('public/uploads/images/')
            ,
            TextEditorField::new('hero'),
            TextEditorField::new('alertMessage'),
            TextEditorField::new('adresse'),
            TextField::new('telephone'),
            TextField::new('mail'),
            NumberField::new('mapCoordonneesX')->setNumDecimals(5),
            NumberField::new('mapCoordonneesY')->setNumDecimals(5),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW)
        ;
    }
}
