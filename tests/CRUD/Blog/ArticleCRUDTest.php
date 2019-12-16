<?php

namespace App\Tests\CRUD\Blog;

use App\Entity\Article;
use App\CRUD\Blog\ArticleCRUD;
use App\CRUD\Blog\AuteurCRUD;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArticleCRUDTest extends WebTestCase
{

    /**
     * @var ArticleCRUD
     */
    private $articleCRUD;

    /**
     * @var AuteurCRUD
     */
    private $auteurCRUD;

    protected function setUp(): void
    {
        self::bootKernel();
        $container = self::$container;

        $this->articleCRUD = $container->get(ArticleCRUD::class);

        $this->auteurCRUD = $container->get(AuteurCRUD::class);
    }

    /**
     * @test
     */
    public function testAddSuccessfulArticle()
    {
        $auteur = $this->auteurCRUD->getAll();
        $auteur = $auteur[0];

        $article = new Article();
        $article->setTitle("test title");
        $article->setContent("test content");
        $article->setDate(new  \DateTime('now'));
        $article->setAuteur($auteur);

        $this->articleCRUD->add($article);

        $articleFromDb = $this->articleCRUD->getOneById($article->getId());

        $this->assertEquals($article->getTitle(), $articleFromDb->getTitle());
    }

    /**
     * @test
     */
    public function testDeleteSuccessfulArticle()
    {
        $auteurs = $this->auteurCRUD->getAll();
        $auteur = $auteurs[0];

        $article = new Article();
        $article->setTitle('test title');
        $article->setContent('test content');
        $article->setDate(new  \DateTime('now'));
        $article->setAuteur($auteur);

        $this->articleCRUD->add($article);

        $articleFromDb = $this->articleCRUD->getOneById($article->getId());
        $this->articleCRUD->delete($article);

        $this->assertNotEmpty($articleFromDb, $message = "Article supprimé");
    }

    /**
     * @test
     */
    public function testUpdateSuccessfulArticle()
    {

        // Get one article
        $articles = $this->articleCRUD->getAll();
        $article = $articles[0];

        // Change article title
        $article->setTitle($article->getTitle() . 'sjsdgdf');

        // Update article
        $this->articleCRUD->update($article);

        // Get article updated
        $articleFromDb = $this->articleCRUD->getOneById($article->getId());

        // verifier si ils sont egaux
        $this->assertEquals(
            $article->getTitle(),
            $articleFromDb->getTitle()
        );
    }
}
