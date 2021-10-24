<?php

namespace App\Controller\Admin;

use App\Entity\Cinema;
use App\Entity\SalleDeProjection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SalleDeProjectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SalleDeProjection::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            ImageField::new('image')
            ->setBasePath('film/')
            ->setUploadDir('public/film')
            ->setUploadedFileNamePattern('[randomhash].[extension]'),
            TextField::new('nom'),
            IntegerField::new('nombredeplace'),
            
      
        ];
    }
    
}
