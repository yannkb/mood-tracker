<?php

namespace App\Controller;

use App\Entity\Mood;
use App\Form\MoodType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/mood', name: 'app_mood_')]
class MoodController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(EntityManagerInterface $em): Response
    {
        $repository = $em->getRepository(Mood::class);
        $moods = $repository->findBy(['userId' => $this->getUser()->getId()], ['createdAt' => 'DESC']);

        return $this->render('mood/index.html.twig', [
            'moods' => $moods,
        ]);
    }

    #[Route('/add', name: 'add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $mood = new Mood();
        $form = $this->createForm(MoodType::class, $mood);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mood->setCreatedAt(new \DateTimeImmutable());
            $mood->setUserId($this->getUser());

            $entityManager->persist($mood);
            $entityManager->flush();

            return $this->redirectToRoute('app_mood_index');
        }

        return $this->render('mood/add.html.twig', [
            'form' => $form,
        ]);
    }
}
