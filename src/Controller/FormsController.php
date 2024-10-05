<?php

namespace App\Controller;

use App\Entity\Insect;
use App\Form\InsectType;
use App\Entity\Observation;
use App\Form\ObservationType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormsController extends AbstractController
{
    #[Route('/forms', name: 'app_form')]
    public function show(): Response
    {
        return $this->render('forms/index.html.twig');
    }

    #[Route('/administration/add_insect', name: 'app_formAddInsect')]
    public function addInsect(Request $req, ManagerRegistry $doctrine): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            // Redirige vers la page d'accueil si l'utilisateur n'a pas le rôle ADMIN
            return $this->redirectToRoute('app_accueil');
        }

        $insect = new Insect();

        $form = $this->createForm(InsectType::class, $insect);

        // gérer l'objet Request, contiendra GET ou POST
        $form->handleRequest($req);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $doctrine->getManager();
            $em->persist($insect);
            $em->flush();
        }

        $vars = ['formInsect' => $form];

        return $this->render('forms/showFormAddInsect.html.twig', $vars);
    }

    // #[Route('/observation/add', name: 'app_addObservation')]
    // public function addObservation(Request $req, ManagerRegistry $doctrine): Response
    // {
    //     if (!$this->isGranted('ROLE_ADMIN')) {
    //         // Redirige vers la page d'accueil si l'utilisateur n'a pas le rôle ADMIN
    //         return $this->redirectToRoute('app_accueil');
    //     }

    //     $observation = new Observation();

    //     $form = $this->createForm(ObservationType::class, $observation);

    //     // gérer l'objet Request, contiendra GET ou POST
    //     $form->handleRequest($req);

    //     if ($form->isSubmitted() && $form->isValid()){
    //         $em = $doctrine->getManager();
    //         $em->persist($observation);
    //         $em->flush();
    //     }

    //     $vars = ['formObservation' => $form];

    //     return $this->render('forms/addObservation.html.twig', $vars);
    // }

    #[Route("/observation/add", name: 'app_addObservation')]
    public function upload (Request $request, ManagerRegistry $doctrine)
    {
        // créer une nouvelle entité vide
        $observation = new Observation();

        // créer un formulaire associé à cette entité
        $formulaireObservation = $this->createForm(ObservationType::class, $observation);

        // gérer la requête (et hydrater l'entité)
        $formulaireObservation->handleRequest($request);

        // vérifier que le formulaire a été envoyé (isSubmitted) et que les données sont valides
        if ($formulaireObservation->isSubmitted() && $formulaireObservation->isValid()) {
            // obtenir le fichier à la main
            $fichier = $formulaireObservation['image']->getData();

            $dossier = $this->getParameter('kernel.project_dir').'/public/dossierFichiers';

            if ($fichier) {
                // obtenir un nom de fichier unique pour éviter les doublons dans le dossier
                $nomFichierServeur = md5(uniqid()) . "." . $fichier->guessExtension();

                // stocker le fichier dans le serveur (on peut indiquer un dossier)
                $fichier->move($dossier, $nomFichierServeur);

                // affecter le nom du fichier de l'entité. Ça sera le nom qu'on
                // aura dans la BD (un string, pas un objet UploadedFile cette fois)
                $observation->setPhoto($nomFichierServeur);
            }

            // stocker l'objet dans la BD, ou faire update
            $em = $doctrine->getManager();
            $em->persist($observation);
            $em->flush();

            return new Response("Entité mise à jour dans la BD. Si le fichier a été selectionné, upload ok!");

        } else {
            return $this->render(
                "forms/addObservation.html.twig",
                ['formulaire' => $formulaireObservation]
            );
        }
    }
}
