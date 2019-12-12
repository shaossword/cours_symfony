<?php

namespace App\Controller;

use App\CRUD\Blog\ArticleCRUD;
use App\Entity\Article;
use App\Form\Blog\ArticleFormType;
use App\Form\Blog\AuteurFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @param Request $request
     * @param ArticleCRUD $articleCRUD
     * @return Response
     */
    function CreateArticle(Request $request, ArticleCRUD $articleCRUD)
    {
        $article = new Article();

        $form = $this->createForm(
            ArticleFormType::class,
            $article
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $articleCRUD->add($article);

            return $this->redirectToRoute('blog_read_all');
        }

        return $this->render('blog/articles/create.html.twig',
            [
                'articleForm' => $form->createView()
            ]
        );
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
     * @Route("/Blog/UpdateArticle/{articleId}", name="blog_update")
     * @param ArticleCRUD $articleCRUD
     * @param Request $request
     * @param $articleId
     * @return Response
     */
    function UpdateArticle(ArticleCRUD $articleCRUD,Request $request,$articleId)
    {
        $article = $articleCRUD->getOneById($articleId);

        $form = $this->createForm(
            ArticleFormType::class,
            $article
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $articleCRUD->add($article);

            return $this->redirectToRoute('blog_read',['articleId'=>$articleId]);
        }

        return $this->render('blog/articles/update.html.twig',
            [
                'articleForm' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/Blog/DeleteArticle/{articleId}", name="blog_delete")
     * @param ArticleCRUD $articleCRUD
     * @param $articleId
     * @return Response
     */
    function DeleteArticle(ArticleCRUD $articleCRUD,$articleId)
    {

        $article= $articleCRUD->getOneById($articleId);

        $articleCRUD->delete($article);

        return  $this->redirectToRoute('blog_read');
    }
}
