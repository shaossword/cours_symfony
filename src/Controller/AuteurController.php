<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class AuteurController
 * @package App\Controller
 */
class AuteurController extends AbstractController
{
    /**
     * @Route("/Blog/CreatAuteur", name="auteur_create")
     * @return Response
     */
    function CreateAuteur()
    {
        $response = new Response();

        $content = "<html><body>Creat Auteur</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @Route("/Blog/ReadAuteur/{id}", name="auteur_read")
     * @param $id
     * @return Response
     */
    function ReadAuteur($id)
    {
        $response = new Response();

        $content = "<html><body>Read Auteur</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @Route("/Blog/ReadAuteurAll", name="auteur_read")
     * @return Response
     */
    function ReadAuteurAll()
    {
        $response = new Response();

        $content = "<html><body>Read Auteur All</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @Route("/Blog/UpdateAuteur/{id}", name="auteur_update")
     * @param $id
     * @return Response
     */
    function UpdateAuteur($id)
    {
        $response = new Response();

        $content = "<html><body>Update Auteur</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @Route("/Blog/DeleteAuteur/{id}", name="auteur_delete")
     * @param $id
     * @return Response
     */
    function DeleteAuteur($id)
    {
        $response = new Response();

        $content = "<html><body>Delete Auteur</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }
}
