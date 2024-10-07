<?php

namespace App\Controller;

use App\Entity\Insect;
use App\Form\InsectType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class FormsController extends AbstractController
{
    #[Route('/forms', name: 'app_form')]
    public function show(): Response
    {
        return $this->render('forms/index.html.twig');
    }

    #[Route('/administration/add_insect', name: 'app_formAddInsect')]
    public function addInsect(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            // Redirige vers la page d'accueil si l'utilisateur n'a pas le rôle ADMIN
            return $this->redirectToRoute('app_accueil');
        }

        $insect = new Insect();

        $form = $this->createForm(InsectType::class, $insect);

        // gérer l'objet Request, contiendra GET ou POST
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            //
            // Gestion de l'image
            //
            $imageFile = $form->get('image')->getData();
            
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // Gérer l'exception si nécessaire
                }

                // Stocker le nom du fichier dans l'entité Observation
                $insect->setImage($newFilename);
            }

            $entityManager->persist($insect);
            $entityManager->flush();

            return $this->redirectToRoute('app_insects');
        }

        $vars = ['formInsect' => $form];

        return $this->render('forms/showFormAddInsect.html.twig', $vars);
    }
}