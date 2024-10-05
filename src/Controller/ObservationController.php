<?php

namespace App\Controller;

use App\Entity\Observation;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ObservationController extends AbstractController
{
    #[Route('/observation', name: 'app_observation')]
    public function show(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        $rep = $em->getRepository(Observation::class);

        $observations = $rep->findAll();
        $vars = ['observations' => $observations];
        
        return $this->render('observation/index.html.twig', $vars);
    }
}
