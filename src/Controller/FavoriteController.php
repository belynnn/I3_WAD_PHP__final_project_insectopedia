<?php

namespace App\Controller;

use App\Entity\Insect;
use App\Entity\Observation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FavoriteController extends AbstractController
{
    #[Route('insects/favoris/ajouter/{id}', name: 'insect_add_favorite')]
    #[IsGranted('ROLE_USER')]
    public function addInsectFavorite(Insect $insect, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
    
        if (!$user->getInsectsFavorite()->contains($insect)) {
            $user->addInsectsFavorite($insect);
            $entityManager->persist($user);
            $entityManager->flush();
        }
    
        return $this->redirectToRoute('app_insect', ['id' => $insect->getId()]);
    }

    #[Route('insects/favoris/supprimer/{id}', name: 'insect_remove_favorite')]
    #[IsGranted('ROLE_USER')]
    public function removeInsectFavorite(Insect $insect, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
    
        if ($user->getInsectsFavorite()->contains($insect)) {
            $user->removeInsectsFavorite($insect);
            $entityManager->persist($user);
            $entityManager->flush();
        }
    
        return $this->redirectToRoute('app_insect', ['id' => $insect->getId()]);
    }

    // OBSERVATIONS
    #[Route('observations/favoris/ajouter/{id}', name: 'observation_add_favorite')]
    #[IsGranted('ROLE_USER')]
    public function addObservationFavorite(Observation $observation, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
    
        if (!$user->getObservationsFavorite()->contains($observation)) {
            $user->addObservationsFavorite($observation);
            $entityManager->persist($user);
            $entityManager->flush();
        }
    
        return $this->redirectToRoute('app_observation', ['id' => $observation->getId()]);
    }

    #[Route('observations/favoris/supprimer/{id}', name: 'observation_remove_favorite')]
    #[IsGranted('ROLE_USER')]
    public function removeObservationFavorite(Observation $observation, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
    
        if ($user->getObservationsFavorite()->contains($observation)) {
            $user->removeObservationsFavorite($observation);
            $entityManager->persist($user);
            $entityManager->flush();
        }
    
        return $this->redirectToRoute('app_observation', ['id' => $observation->getId()]);
    }
}