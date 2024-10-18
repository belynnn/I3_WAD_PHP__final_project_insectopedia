<?php

namespace App\Controller;

use App\Entity\Insect;
use App\Entity\Observation;
use App\Form\ObservationType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ObservationController extends AbstractController
{
    ///////////////////////////////////////////////////////////////////////
    //
    // Liste de toutes les observations
    //
    #[Route('/observations', name: 'app_observations')]
    public function showObservations(ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        $rep = $em->getRepository(Observation::class);

        $observations = $rep->findAll();
        $vars = ['observations' => $observations];
        
        return $this->render('observation/showObservations.html.twig', $vars);
    }

    ///////////////////////////////////////////////////////////////////////
    //
    // Page d'une observation spécifique
    //
    #[Route('/observations/afficher/{id}', name: 'app_observation')]
    public function showObservation(int $id, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $rep = $em->getRepository(Observation::class);

        $observation = $rep->find($id);

        // Gérer le cas où l'observation n'est pas trouvée
        if (!$observation) {
            throw $this->createNotFoundException('Observation non trouvée');
        }
        
        // Récupérer l'utilisateur connecté
        $user = $this->getUser();
        
        // Vérifier si l'observation est déjà dans les favoris de l'utilisateur
        $isFavorite = false;
        if ($user && $user->getObservationsFavorite()->contains($observation)) {
            $isFavorite = true;
        }

        // Recherche de l'insecte par son nom
        $insect = $em->getRepository(Insect::class)->findOneBy(['nameInsect' => $observation->getNameInsect()]);

        // Récupérer l'utilisateur de l'observation
        $user = $observation->getCreatedBy();

        // Compter le nombre total d'observations réalisées par cet utilisateur
        $totalObservations = $rep->count(['createdBy' => $user]);

        return $this->render('observation/showObservation.html.twig', [
            'observation' => $observation,
            'isFavorite' => $isFavorite,
            'insect' => $insect, // Ajouter l'insecte trouvé à la vue
            'totalObservations' => $totalObservations, // Passer le nombre total d'observations à la vue
        ]);
    }

    ///////////////////////////////////////////////////////////////////////
    //
    // Page pour afficher le formulaire afin d'encoder une observation
    //
    #[Route('/observations/ajouter', name: 'app_add_observation')]
    public function addObservation(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $observation = new Observation();
        $form = $this->createForm(ObservationType::class, $observation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //
            // Gestion de l'image
            //
            $photoFile = $form->get('photo')->getData();
            
            if ($photoFile) {
                $originalFilename = pathinfo($photoFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$photoFile->guessExtension();

                try {
                    $photoFile->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // Gérer l'exception si nécessaire
                }

                // Stocker le nom du fichier dans l'entité Observation
                $observation->setPhoto($newFilename);
            }

            // Associer l'utilisateur connecté à l'observation
            $user = $this->getUser(); // Récupère l'utilisateur connecté
            $observation->setCreatedBy($user);

            $entityManager->persist($observation);
            $entityManager->flush();

            return $this->redirectToRoute('app_observations');
        }

        return $this->render('observation/addObservation.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}