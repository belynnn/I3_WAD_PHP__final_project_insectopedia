<?php

namespace App\Controller;

use App\Entity\Insect;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InsectController extends AbstractController
{
    // Liste de tous les insects
    #[Route('/insect/all', name: 'app_insectAll')]
    public function show(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        $rep = $em->getRepository(Insect::class);

        $insects = $rep->findAll();
        $vars = ['insects' => $insects];
        
        return $this->render('insect/listInsect.html.twig', $vars);
    }

    // Page d'un insect spécifique
    #[Route('/insect/{id}', name: 'app_insect')]
    public function showInsect(int $id, EntityManagerInterface $entityManager): Response
    {
        // Récupérer l'insect correspondant à l'ID
        $insect = $entityManager->getRepository(Insect::class)->find($id);
    
        // Gérer le cas où l'insect n'est pas trouvé
        if (!$insect) {
            throw $this->createNotFoundException('insect non trouvé');
        }
    
        // Récupérer l'utilisateur connecté
        $user = $this->getUser();
    
        // Vérifier si l'insect est déjà dans les favoris
        $isFavorite = false;
        if ($user) {
            $isFavorite = $user->getInsectsFavorite()->contains($insect);
        }
    
        // Passer l'insect et l'info "favorite" au template Twig
        return $this->render('insect/insect.html.twig', [
            'insect' => $insect,
            'isFavorite' => $isFavorite,
        ]);
    }
}