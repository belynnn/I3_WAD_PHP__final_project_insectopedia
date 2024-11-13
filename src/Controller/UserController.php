<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig');
    }

    #[Route('/user/profil', name: 'app_userProfil')]
    public function userProfil(UserRepository $userRepository): Response
    {
        // Supposons que vous utilisez l'authentification Symfony
        $user = $this->getUser(); // Récupère l'utilisateur courant
    
        // Assurez-vous que l'utilisateur est connecté
        if (!$user) {
            throw $this->createAccessDeniedException('Vous devez être connecté pour accéder à ce profil.');
        }
    
        // Récupérer les insectes favoris de l'utilisateur
        $favoriteInsects = $user->getInsectsFavorite();

        // Récupérer les observations favorites de l'utilisateur
        $favoriteObservations = $user->getObservationsFavorite();
    
        // Rendre la vue avec les insectes favoris
        return $this->render('user/user_profil.html.twig', [
            'favoriteInsects' => $favoriteInsects,
            'favoriteObservations' => $favoriteObservations,
        ]);
    }

    #[Route('/user/observations', name: 'app_user')]
    public function userObservation(): Response
    {
        return $this->render('user/index.html.twig');
    }
}