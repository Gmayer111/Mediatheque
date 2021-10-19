<?php

namespace App\Controller\Admin;

use App\Entity\Book;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\HiddenField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;

class BookCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Book::class;
    }


    public function configureFields(string $pageName): iterable
    {

        return [
            TextField::new('title', 'Titre'),
            TextEditorField::new('description', 'Description')->hideOnIndex(),
            TextField::new('author', 'Auteur'),
            TextField::new('genre'),
            ChoiceField::new('availability')->setChoices(['disponible' => "1", 'non disponible' => '0']),
            DateTimeField::new('publication_date')->hideOnIndex(),
            HiddenField::new('borrower_id', 'Emprunté par..'),
            TextField::new('picture')->setFormType(VichImageType::class)->hideOnIndex(),
            ImageField::new('filename')->setBasePath('/images/books')->onlyOnIndex(),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // ...
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_EDIT, Action::SAVE_AND_ADD_ANOTHER)
            ->disable(Action::DELETE)
            ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('filename')
            ->add('borrower_id')
            ;
    }

}
