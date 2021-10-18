<?php

namespace App\Controller\Admin;

use App\Entity\Book;
use App\Entity\Catalogue;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class BookCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Book::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $catalogue = new Catalogue();
        $name = $catalogue->getCatalogueName();

        return [
            /*IdField::new('id'),*/
            TextField::new('title'),
            TextEditorField::new('description')->hideOnIndex(),
            TextField::new('author'),
            TextField::new('genre'),
            DateTimeField::new('publication_date'),
            /*BooleanField::new('availability'),*/
            TextField::new('picture')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('filename')->setBasePath('/images/books')->onlyOnIndex(),

        ];
    }

}
