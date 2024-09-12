<?php

namespace App\Controller;

use App\Entity\Insecte;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InsectController extends AbstractController
{
    // Liste de tous les insectes
    #[Route('/insect/all')]
    public function listInsect(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        $rep = $em->getRepository(Insecte::class);

        $insectes = $rep->findAll();
        $vars = ['insectes' => $insectes];
        
        return $this->render('insect/listInsect.html.twig', $vars);
    }

    // Page d'un insecte spécifique
    #[Route('/insect/{id}', name: 'app_insect')]
    public function insect(): Response
    {
        return $this->render('insect/insect.html.twig', [
            'controller_name' => 'InsectController',
        ]);
    }
}
