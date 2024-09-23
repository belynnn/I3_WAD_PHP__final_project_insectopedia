<?php

namespace App\Controller;

use App\Entity\Insect;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class FavoriteController extends AbstractController
{
    #[Route('/favorite/add/{id}', name: 'add_favorite')]
    #[IsGranted('ROLE_USER')]
    public function addFavorite(Insect $insect, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
    
        if (!$user->getInsectsFavorite()->contains($insect)) {
            $user->addInsectsFavorite($insect);
            $entityManager->persist($user);
            $entityManager->flush();
        }
    
        return $this->redirectToRoute('app_insect', ['id' => $insect->getId()]);
    }

    #[Route('/favorite/remove/{id}', name: 'remove_favorite')]
    #[IsGranted('ROLE_USER')]
    public function removeFavorite(Insect $insect, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
    
        if ($user->getInsectsFavorite()->contains($insect)) {
            $user->removeInsectsFavorite($insect);
            $entityManager->persist($user);
            $entityManager->flush();
        }
    
        return $this->redirectToRoute('app_insect', ['id' => $insect->getId()]);
    }
}