<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InsectController extends AbstractController
{
    // Liste de tous les insectes
    #[Route('/insects', name: 'app_insects')]
    public function insects(): Response
    {
        return $this->render('insects/insects.html.twig', [
            'controller_name' => 'InsectController',
        ]);
    }

    // Page d'un insecte spécifique
    #[Route('/insects/{id}', name: 'app_insects')]
    public function insect(): Response
    {
        return $this->render('insects/insect.html.twig', [
            'controller_name' => 'InsectController',
        ]);
    }
}
