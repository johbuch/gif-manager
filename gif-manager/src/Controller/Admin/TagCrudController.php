<?php

namespace App\Controller\Admin;

use App\Entity\Tag;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TagCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tag::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('tag')
            ->setEntityLabelInPlural('tags')
            ->setPageTitle('index', 'Liste des %entity_label_plural%')
            ->setPageTitle('new', 'Ajouter un %entity_label_singular%')
            ->setPageTitle('edit', 'Modifier un %entity_label_singular%')
            ;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function(Action $action) {
                return $action->setIcon('fa fa-file-alt')->setLabel('Ajouter un %entity_label_singular%');
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function(Action $action) {
                return $action->setIcon('fas fa-edit')->setLabel(false);
            })
            ->update(Crud::PAGE_INDEX, Action::DELETE, function(Action $action) {
                return $action->setIcon('fas fa-trash')->setLabel(false);
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_RETURN, function(Action $action) {
                return $action->setLabel('Enregistrer');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER, function(Action $action) {
                return $action->setLabel('Enregistrer et créer un nouveau');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE, function(Action $action) {
                return $action->setLabel('Enregistrer et continuer à modifier');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN, function(Action $action) {
                return $action->setLabel('Enregistrer les modifications');
            })
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name', 'Nom'),
            AssociationField::new('gifs')->onlyOnIndex(),
            DateTimeField::new('createdAt', 'Créé le')->onlyOnIndex(),
            DateTimeField::new('updatedAt', 'Modifié le')->onlyOnIndex()
        ];
    }

    /**
     * overwrite the method to automatically update the updatedAt field when editing
     */
    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $entityInstance->setUpdatedAt(new \DateTime());
        $entityManager->persist($entityInstance);
        $entityManager->flush();
    }
}
