<?php

namespace App\Controller;

use App\Repository\FilmRepository;
use App\Repository\SerieRepository;
use DateTime;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class WebsiteController extends AbstractController
{
    #[Route(name: 'app_website')]
    public function index(FilmRepository $filmRepository, SerieRepository $serieRepository): Response
    {
        $films = $filmRepository->findAll();
        $series = $serieRepository->findAll();

        $dateDuDernierFilm = $films[0]->getDateSortie();
        

        // Le boucle pour trouver le dernier films

        for ($i=1; $i < count($films); $i++) {
            if($dateDuDernierFilm < $films[$i]->getDateSortie()) 
                $dateDuDernierFilm = $films[$i]->getDateSortie();
        }

        $newFilms = [];

        for ($i=0; $i < count($films); $i++) { 
            if($dateDuDernierFilm < $films[$i]->getDateSortie()) {
                if(count($newFilms) >= 5) {
                    if(count($newFilms > ))
                }
                $newFilms[] = $films[$i];
            }
        }

        return $this->render("base.html.twig");
    }
}
