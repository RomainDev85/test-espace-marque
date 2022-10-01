<?php

namespace App\Controller;

use App\Entity\Movie;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutMovieController extends AbstractController
{
    #[Route('/about/{movie}', name: 'app_about_movie')]
    public function index(ManagerRegistry $doctrine, int $movie): Response
    {

        $movie = $doctrine->getRepository(Movie::class)->findOneBy(["id" => $movie]);

        return $this->render('about_movie/index.html.twig', [
            'movie' => $movie,
        ]);
    }
}
