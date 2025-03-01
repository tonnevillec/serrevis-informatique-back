<?php

namespace App\Controller\Admin;

use App\Entity\Ventes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use Symfony\Component\Validator\Constraints\File;

class VentesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ventes::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('titre'),
            TextField::new('modele'),
            TextField::new('description')->onlyOnForms(),
            TextField::new('dateMiseEnVente'),
            ImageField::new('pdf')
                ->setFormType(FileUploadType::class)
                ->setBasePath('uploads/ventes/')
                ->setUploadDir('public/uploads/ventes/')
                ->onlyOnForms()
                ->setFileConstraints(new File([
                    'mimeTypes' => [
                        'application/pdf',
                        'application/x-pdf',
                    ],
                ]))
            ,
            TextField::new('prix'),
            TextEditorField::new('parametres')->onlyOnForms(),
        ];
    }
}
