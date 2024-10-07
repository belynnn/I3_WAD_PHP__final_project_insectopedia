<?php

namespace App\Controller;

use App\Entity\Insect;
use App\Repository\InsectRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InsectController extends AbstractController
{
    ///////////////////////////////////////////////////////////////////////
    //
    // Liste de tous les insectes
    //
    #[Route('/insectes', name: 'app_insects')]
    public function showInsects(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        $rep = $em->getRepository(Insect::class);

        $insects = $rep->findAll();
        $vars = ['insects' => $insects];
        
        return $this->render('insect/showInsects.html.twig', $vars);
    }

    ///////////////////////////////////////////////////////////////////////
    //
    // Page d'un insecte spécifique
    //
    #[Route('/insectes/afficher/{id}', name: 'app_insect')]
    public function showInsect(int $id, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $rep = $em->getRepository(Insect::class);

        $insect = $rep->find($id);

        // Gérer le cas où l'insect n'est pas trouvé
        if (!$insect) {
            throw $this->createNotFoundException('Insecte non trouvé');
        }

        // Récupérer l'utilisateur connecté
        $user = $this->getUser();
    
        // Vérifier si l'insect est déjà dans les favoris de l'utilisateur
        $isFavorite = false;
        if ($user && $user->getInsectsFavorite()->contains($insect)) {
            $isFavorite = true;
        }
    
        // Passer l'insect et le statut "favorite" au template
        return $this->render('insect/showInsect.html.twig', [
            'insect' => $insect,
            'isFavorite' => $isFavorite,
        ]);
    }

    ///////////////////////////////////////////////////////////////////////
    //
    // Barre de recherche liée aux insectes
    //
    #[Route('/insectes/rechercher', name: 'app_insects_search')]
    public function rechercherInsectes(Request $request, InsectRepository $insectRepository): JsonResponse
    {
        $term = $request->query->get('term');
        $insects = $insectRepository->findInsectsBySearchTerm($term);
    
        $results = [];
        foreach ($insects as $insect) {
            $results[] = [
                'id' => $insect->getId(),
                'nameInsect' => $insect->getNameInsect(),
            ];
        }
    
        return new JsonResponse($results);
    }
}