<?php

namespace App\Controller;

use App\Entity\Movie;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ManagerRegistry $doctrine): Response
    {

        $movies = $doctrine->getRepository(Movie::class)->findAll();

        return $this->render('home/index.html.twig', [
            'movies' => $movies,
        ]);
    }
}
