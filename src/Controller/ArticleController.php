<?php

namespace App\Controller;

use App\CRUD\Blog\ArticleCRUD;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class ArticleController
 * @package App\Controller
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/Blog/CreateArticle", name="blog_create")
     * @return Response
     */
    function CreateArticle()
    {

        return $this->render('blog/articles/create.html.twig');
    }

    /**
     * @Route("/Blog/ReadArticle/{articleId}", name="blog_read")
     * @param ArticleCRUD $articleCRUD
     * @param $articleId
     * @return Response
     */
    function ReadArticle(ArticleCRUD $articleCRUD, $articleId)
    {
        /** @var Article $article */
        $article = $articleCRUD->getOneById($articleId);

        return $this->render('blog/articles/detail.html.twig',
            [
                'article' => $article,
            ]);
    }



    /**
     * @Route("/Blog/ReadArticleAll", name="blog_read_all")
     * @param ArticleCRUD $articleCRUD
     * @return Response
     */
    function ReadArticleAll(ArticleCRUD $articleCRUD)
    {
        $articles = $articleCRUD->getAll();

        return $this->render('blog/articles/all.html.twig',
            [
                'articles' => $articles,
            ]);
    }

    /**
     * @Route("/Blog/UpdateArticle/{id}", name="blog_update")
     * @param $id
     * @return Response
     */
    function UpdateArticle($id)
    {

        return $this->render('blog/articles/update.html.twig');
    }

    /**
     * @Route("/Blog/DeleteArticle/{id}", name="blog_delete")
     * @param $id
     * @return Response
     */
    function DeleteArticle($id)
    {

        return $this->render('blog/articles/delete.html.twig');
    }
}
