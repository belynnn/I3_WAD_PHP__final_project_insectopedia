<?php

namespace App\Controller;

use App\Entity\Insect;
use App\Form\InsectType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormsController extends AbstractController
{
    #[Route('/forms', name: 'app_form')]
    public function index(): Response
    {
        return $this->render('forms/index.html.twig');
    }

    #[Route('/administration/add_insect', name: 'app_formAddInsect')]
    public function show(Request $req, ManagerRegistry $doctrine): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            // Redirige vers la page d'accueil si l'utilisateur n'a pas le rôle ADMIN
            return $this->redirectToRoute('app_accueil');
        }

        $insect = new Insect();

        $form = $this->createForm(InsectType::class, $insect);

        // gérer l'objet Request, contiendra GET ou POST
        $form->handleRequest($req);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $doctrine->getManager();
            $em->persist($insect);
            $em->flush();
        }

        $vars = ['formInsect' => $form];

        return $this->render('forms/showFormAddInsect.html.twig', $vars);
    }
}
