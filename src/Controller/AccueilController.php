<?php

namespace App\Controller;

use App\Repository\ObservationRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(ObservationRepository $observationRepository): Response
    {
        $observations = $observationRepository->findAll(); // Récupérer toutes les observations

        return $this->render('accueil/index.html.twig', [
            'observations' => $observations,
        ]);
    }
}
