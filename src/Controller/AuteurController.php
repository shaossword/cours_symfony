<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class Article
 * @package App\Controller
 */
class AuteurController extends AbstractController
{
    /**
     * @Route("/Blog/CreatAuteur", name="auteur_create")
     * @return Response
     */
    function CreatAuteur()
    {
        // $response = new Response();

        // $content = "<html><body></body></html>";
        // $response->setContent($content);
        // $response->setStatusCode(200);

        // return $response;
        return $this->render('blog/articles/create.html.twig');

    }

    /**
     * @Route("/Blog/ReadAuteur/{id}", name="auteur_read")
     * @param $id
     * @return Response
     *
     */
    function ReadAuteur($id)
    {
        // $response = new Response();

        // $content = "<html><body></body></html>";
        // $response->setContent($content);
        // $response->setStatusCode(200);

        // return $response;
        return $this->render('blog/articles/detail.html.twig');

    }

    /**
     * @Route("/Blog/ReadAuteurAll", name="auteur_read_all")
     * @param $id
     * @return Response
     */
    function ReadAuteurAll()
    {
        // $response = new Response();

        // $content = "<html><body></body></html>";
        // $response->setContent($content);
        // $response->setStatusCode(200);

        // return $response;
        return $this->render('blog/articles/all.html.twig');

    }

    /**
     * @Route("/Blog/UpdateAuteur/{id}", name="auteur_update")
     * @param $id
     * @return Response
     */
    function UpdateAuteur($id)
    {
        // $response = new Response();

        // $content = "<html><body></body></html>";
        // $response->setContent($content);
        // $response->setStatusCode(200);

        // return $response;
        return $this->render('blog/articles/update.html.twig');

    }

    /**
     * @Route("/Blog/DeleteAuteur/{id}", name="auteur_delete")
     * @param $id
     * @return Response
     */
    function DeleteAuteur($id)
    {
        // $response = new Response();

        // $content = "<html><body></body></html>";
        // $response->setContent($content);
        // $response->setStatusCode(200);

        // return $response;
        return $this->render('blog/articles/delete.html.twig');

    }
}
