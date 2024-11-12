<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdministrationController extends AbstractController
{
    #[Route('/administration', name: 'app_administration')]
    public function index(): Response
    {
        // Vérifie si l'utilisateur a le rôle ADMIN
        if (!$this->isGranted('ROLE_ADMIN')) {
            // Redirige vers la page d'accueil si l'utilisateur n'a pas le rôle ADMIN
            return $this->redirectToRoute('app_accueil');
        }

        // Si l'utilisateur a le rôle ADMIN, affiche la page d'administration
        return $this->render('administration/index.html.twig');
    }
}
