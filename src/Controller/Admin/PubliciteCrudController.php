<?php

namespace App\Controller\Admin;

use App\Entity\Publicite;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PubliciteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Publicite::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            ImageField::new('image')
               ->setBasePath('film/')
               ->setUploadDir('public/film')
               ->setUploadedFileNamePattern('[randomhash].[extension]'),
            TextEditorField::new('description'),
        ];
    }
    
}
