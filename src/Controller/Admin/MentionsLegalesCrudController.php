<?php

namespace App\Controller\Admin;

use App\Entity\MentionsLegales;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MentionsLegalesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MentionsLegales::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextEditorField::new('description'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW)
            ;
    }
}
