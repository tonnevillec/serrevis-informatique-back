<?php

namespace App\Controller\Admin;

use App\Entity\BoutiquePhotos;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BoutiquePhotosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BoutiquePhotos::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->OnlyOnIndex(),
            ImageField::new('img')
                ->setBasePath('/uploads/images')
                ->setUploadDir('public/uploads/images/')
            ,
            TextField::new('alt'),
        ];
    }
}
