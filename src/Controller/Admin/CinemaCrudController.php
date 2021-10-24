<?php

namespace App\Controller\Admin;

use App\Entity\Cinema;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CinemaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cinema::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('nom'),
            TextField::new('adresse'),
            NumberField::new('telephone'),
            EmailField::new('email'),
            ImageField::new('image')
            ->setBasePath('film/')
            ->setUploadDir('public/film')
            ->setUploadedFileNamePattern('[randomhash].[extension]'),
        ];
    }
   
}
