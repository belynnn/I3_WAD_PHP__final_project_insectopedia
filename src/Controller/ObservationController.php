<?php

namespace App\Controller;

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
            throw $this->createNotFoundException('Observation non trouvé');
        }
    
        return $this->render('observation/showObservation.html.twig', [
            'observation' => $observation,
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

            $entityManager->persist($observation);
            $entityManager->flush();

            return $this->redirectToRoute('app_observations');
        }

        return $this->render('observation/addObservation.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
