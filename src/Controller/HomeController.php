<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        // if (!is_null($this->getUser())) {
        //     return $this->redirectToRoute('app_mood_index');
        // }
        return $this->render('home/index.html.twig');
    }
}
