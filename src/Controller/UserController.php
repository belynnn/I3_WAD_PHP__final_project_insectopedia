<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig');
    }

    #[Route('/user/profil', name: 'app_user')]
    public function userProfil(): Response
    {
        return $this->render('user/index.html.twig');
    }

    #[Route('/user/observations', name: 'app_user')]
    public function userObservation(): Response
    {
        return $this->render('user/index.html.twig');
    }
}
