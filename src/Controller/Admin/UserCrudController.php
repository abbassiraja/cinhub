<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('image')
               ->setBasePath('film/')
               ->setUploadDir('public/film')
               ->setUploadedFileNamePattern('[randomhash].[extension]'),
            TextField::new('nom'),
            TextField::new('prenom'),
            DateField::new('date_de_naissance'),
            EmailField::new('email'),
            TextField::new('password'),
        ];
    }
    
}
