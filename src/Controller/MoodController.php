<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoodController extends AbstractController
{
    #[Route('/mood', name: 'app_mood')]
    public function index(): Response
    {
        return $this->render('mood/index.html.twig', [
            'controller_name' => 'MoodController',
        ]);
    }
}
