<?php

namespace App\Controller;

use App\Form\InsectType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormsController extends AbstractController
{
    #[Route('/forms', name: 'app_form')]
    public function index(): Response
    {
        return $this->render('forms/index.html.twig');
    }

    #[Route('/administration/add_insect', name: 'app_formAddInsect')]
    public function show(): Response
    {
        $form = $this->createForm(InsectType::class);

        $vars = ['formInsect' => $form];

        return $this->render('forms/showFormAddInsect.html.twig', $vars);
    }
}
