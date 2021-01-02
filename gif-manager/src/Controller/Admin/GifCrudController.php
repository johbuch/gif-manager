<?php

namespace App\Controller\Admin;

use App\Entity\Gif;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GifCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gif::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name', 'Nom'),
            AssociationField::new('tagId', 'Tags')->setFormTypeOption('by_reference', false),
            DateTimeField::new('createdAt', 'Crée le')->onlyOnIndex(),
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
