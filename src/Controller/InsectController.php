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
    // Liste de tous les insects
    #[Route('/insectes/all', name: 'app_insectAll')]
    public function show(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        $rep = $em->getRepository(Insect::class);

        $insects = $rep->findAll();
        $vars = ['insects' => $insects];
        
        return $this->render('insect/listInsect.html.twig', $vars);
    }

    // Page d'un insect spécifique
    #[Route('/insecte/{id}', name: 'app_insect')]
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
        return $this->render('insect/insect.html.twig', [
            'insect' => $insect,
            'isFavorite' => $isFavorite,
        ]);
    }

    #[Route('insectes/rechercher', name: 'app_insects_search')]
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