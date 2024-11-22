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

        // Sélectionner une observation au hasard
        $randomObservation = null;
        if (!empty($observations)) {
            $randomKey = array_rand($observations);
            $randomObservation = $observations[$randomKey];
        }

        // Compter le nombre total d'observations
        $totalObservations = count($observations);

        return $this->render('accueil/index.html.twig', [
            'observations' => $observations,
            'randomObservation' => $randomObservation,
            'totalObservations' => $totalObservations,
        ]);
    }

    #[Route('/apropos', name: 'app_apropos')]
    public function apropos(): Response
    {
        return $this->render('apropos/apropos.html.twig');
    }
}