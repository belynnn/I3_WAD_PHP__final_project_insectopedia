<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Insect;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class FavoriteController extends AbstractController
{
    #[Route('/favorite/add/{id}', name: 'add_favorite')]
    #[IsGranted('ROLE_USER')]
    public function addFavorite(Insect $insect, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser(); // Obtenir l'utilisateur connecté

        if (!$user->getInsectsFavorite()->contains($insect)) {
            $user->addInsectsFavorite($insect);
            $entityManager->persist($user); // Persist the user with the new favorite
            $entityManager->flush();

            $this->addFlash('success', 'Insecte ajouté à vos favoris.');
        } else {
            $this->addFlash('warning', 'Cet insecte est déjà dans vos favoris.');
        }

        return $this->redirectToRoute('app_insect', ['id' => $insect->getId()]);
    }

    #[Route('/favorite/remove/{id}', name: 'remove_favorite')]
    #[IsGranted('ROLE_USER')]
    public function removeFavorite(Insect $insect, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser(); // Obtenir l'utilisateur connecté

        if ($user->getInsectsFavorite()->contains($insect)) {
            $user->removeInsectsFavorite($insect);
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Insecte retiré de vos favoris.');
        } else {
            $this->addFlash('warning', 'Cet insecte n\'était pas dans vos favoris.');
        }

        return $this->redirectToRoute('app_insect', ['id' => $insect->getId()]);
    }
}