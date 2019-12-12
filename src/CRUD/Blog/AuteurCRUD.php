<?php

namespace App\CRUD\Blog;

use App\Entity\Auteur;
use Doctrine\ORM\EntityManagerInterface;

class AuteurCRUD
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var \App\Repository\Blog\AuteurRepository|\Doctrine\Common\Persistence\ObjectRepository
     */
    private $repo;

    public function __construct(EntityManagerInterface $em)
    {

        $this->em = $em;
        $this->repo = $em->getRepository('App:Auteur');
    }

    /**
     * @param Auteur $Auteur
     */
    public function add(Auteur $Auteur): void
    {
        $this->persist($Auteur);
    }

    /**
     * @param Auteur $Auteur
     */
    public function update(Auteur $Auteur): void
    {
        $this->persist($Auteur);
    }

    /**
     * @param int $id
     * @return Auteur
     */
    public function getOneById(int $id): Auteur
    {
        return  $this->repo->find($id);
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->repo->findAll();
    }

    /**
     * @param Auteur $Auteur
     */
    public function delete(Auteur $Auteur): void
    {
        $this->em->remove($Auteur);
        $this->em->flush();
    }

    private function persist(Auteur $Auteur)
    {
        $this->em->persist($Auteur);
        $this->em->flush();
    }
}