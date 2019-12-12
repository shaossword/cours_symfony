<?php

namespace App\Controller;


use App\CRUD\Blog\ArticleCRUD;
use App\CRUD\Blog\AuteurCRUD;
use App\Entity\Article;
use App\Form\Blog\AuteurFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Auteur;


/**
 * Class Article
 * @package App\Controller
 */
class AuteurController extends AbstractController
{
    /**
     * @Route("/Blog/CreatAuteur", name="auteur_create")
     * @param Request $request
     * @param AuteurCRUD $auteurCRUD
     * @return Response
     */
    function CreatAuteur(Request $request, AuteurCRUD $auteurCRUD)
    {

        $auteur = new Auteur();

        $form = $this->createForm(
            AuteurFormType::class,
            $auteur
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $auteurCRUD->add($auteur);

            return $this->redirectToRoute('auteur_read_all');
        }

        return $this->render('blog/auteur/create.html.twig',
            [
                'auteurForm' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/Blog/ReadAuteur/{auteurId}", name="auteur_read")
     * @param AuteurCRUD $auteurCRUD
     * @param $auteurId
     * @return Response
     */
    function ReadAuteur(AuteurCRUD $auteurCRUD, $auteurId)
    {

        /** @var Auteur $auteur */
        $auteur = $auteurCRUD->getOneById($auteurId);

        return $this->render('blog/auteur/detail.html.twig',
            [
                'auteur' => $auteur,
            ]);
    }

    /**
     * @Route("/Blog/ReadAuteurAll", name="auteur_read_all")
     * @param AuteurCRUD $auteurCRUD
     * @return Response
     */
    function ReadAuteurAll(AuteurCRUD $auteurCRUD)
    {

        $auteurs = $auteurCRUD->getAll();

        return $this->render('blog/auteur/all.html.twig',
            [
                'auteurs' => $auteurs,
            ]);

    }

    /**
     * @Route("/Blog/UpdateAuteur/{auteurId}", name="auteur_update")
     * @param AuteurCRUD $auteurCRUD
     * @param Request $request
     * @param $auteurId
     * @return Response
     */
    function UpdateAuteur(AuteurCRUD $auteurCRUD,Request $request,$auteurId)
    {

        $auteur = $auteurCRUD->getOneById($auteurId);

        $form = $this->createForm(
            AuteurFormType::class,
            $auteur
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $auteurCRUD->add($auteur);

            return $this->redirectToRoute('auteur_read',['auteurId'=>$auteurId]);
        }

        return $this->render('blog/auteur/update.html.twig',
            [
                'auteurForm' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/Blog/DeleteAuteur/{auteurId}", name="auteur_delete")
     * @param AuteurCRUD $auteurCRUD
     * @param $auteurId
     * @return Response
     */
    function DeleteAuteur(AuteurCRUD $auteurCRUD,$auteurId)
    {

        $auteur = $auteurCRUD->getOneById($auteurId);

        $auteurCRUD->delete($auteur);

        return  $this->redirectToRoute('auteur_read_all');

    }
}
