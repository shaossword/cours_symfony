<?php

namespace App\Tests\CRUD\Blog;


use App\CRUD\Blog\AuteurCRUD;
use App\Entity\Auteur;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuteurCRUDTest extends WebTestCase
{

    /**
     * @var AuteurCRUD
     */
    private $auteurCRUD;

    protected function setUp(): void
    {
        self::bootKernel();
        $container = self::$container;

        $this->auteurCRUD = $container->get(AuteurCRUD::class);
    }

    /**
     * @test
     */
    public function testAddSuccessfulAuteur()
    {

        $auteur = new Auteur();
        $auteur->setFirstName("bob");
        $auteur->setLastName("marley");


        $this->auteurCRUD->add($auteur);

        $auteurFromDb = $this->auteurCRUD->getOneById($auteur->getId());

        $this->assertEquals($auteur->getFirstName(), $auteurFromDb->getFirstName());
    }


    /**
     * @test
     */
    public function testDeleteSuccessfulAuteur()
    {

        $auteur = new Auteur();
        $auteur->setFirstName("bob");
        $auteur->setLastName("morane");


        $this->auteurCRUD->add($auteur);

        $auteurFromDb = $this->auteurCRUD->getOneById($auteur->getId());

        $this->auteurCRUD->delete($auteur);


        $this->assertNotEmpty($auteurFromDb, $message = "Auteur supprimé");
    }


    /**
     * @test
     */
    public function testUpdateSuccessfulAuteur()
    {

        // Get one auteur
        $auteurs = $this->auteurCRUD->getAll();
        $auteur = $auteurs[0];

        // Change auteur title
        $auteur->setFirstName($auteur->getFirstName() . 'lol');

        // Update auteur
        $this->auteurCRUD->update($auteur);

        // Get auteur updated
        $auteurFromDb = $this->auteurCRUD->getOneById($auteur->getId());

        // verifier si ils sont egaux
        $this->assertEquals($auteur->getFirstName(), $auteurFromDb->getFirstName());
    }
}
