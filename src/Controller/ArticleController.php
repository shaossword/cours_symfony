<?php

namespace App\Controller;


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
        // $response = new Response();

        // $content = "<html>
        //         <body>
        //     <h1>Create Article</h1>
        //     <form>
        //    titre :<input name='titre' type='text'>
        //   contenue :<input name='contenue' type='text'>
        //   auteur :<input name='auteur' type='text'>
        //   date :<input name='date' type='date'>
        //   </form>
        //   </body>
        //   </html>";
        // $response->setContent($content);
        // $response->setStatusCode(200);

        // return $response;
        return $this->render('blog/articles/create.html.twig');
    }

    /**
     * @Route("/Blog/ReadArticle/{id}", name="blog_read")
     * @param $id
     * @return Response
     */
    function ReadArticle($id)
    {
        // $response = new Response();

        // $content = "<html><body>Read Article</body></html>";
        // $response->setContent($content);
        // $response->setStatusCode(200);

        // return $response;
        return $this->render('blog/articles/detail.html.twig');
    }

    /**
     * @Route("/Blog/ReadArticleAll", name="blog_read_all")
     * @return Response
     */
    function ReadArticleAll()
    {
        // $response = new Response();

        // $content = "<html><body>Read Article All</body></html>";
        // $response->setContent($content);
        // $response->setStatusCode(200);

        // return $response;
        return $this->render('blog/articles/all.html.twig');
    }

    /**
     * @Route("/Blog/UpdateArticle/{id}", name="blog_update")
     * @param $id
     * @return Response
     */
    function UpdateArticle($id)
    {
        // $response = new Response();

        // $content = "<html><body>Update Article</body></html>";
        // $response->setContent($content);
        // $response->setStatusCode(200);

        // return $response;
        return $this->render('blog/articles/update.html.twig');
    }

    /**
     * @Route("/Blog/DeleteArticle/{id}", name="blog_delete")
     * @param $id
     * @return Response
     */
    function DeleteArticle($id)
    {
        // $response = new Response();

        // $content = "<html><body>Delete Article</body></html>";
        // $response->setContent($content);
        // $response->setStatusCode(200);

        // return $response;
        return $this->render('blog/articles/delete.html.twig');
    }
}
