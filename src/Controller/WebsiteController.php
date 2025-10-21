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
            if($dateDuDernierFilm >= $films[$i]->getDateSortie()) {

                if(count($newFilms) >= 5) {

                    for ($j=0; $j < count($newFilms); $j++) { 

                        if ($newFilms[$j]->getDateSortie() < $films[$i]->getDateSortie())
                        {
                            unset($newFilms[$j]);
                            array_unshift($newFilms, $films[$i]);
                            break;
                        }

                    }

                    continue;
                }

                $newFilms[] = $films[$i];
            }
        }


        $dateDuDernierSerie = $series[0]->getDateSortie();

        for ($i=1; $i < count($series); $i++) {
            if($dateDuDernierSerie < $series[$i]->getDateSortie()) 
                $dateDuDernierSerie = $series[$i]->getDateSortie();
        }

        $newSeries = [];

        for ($i=0; $i < count($series); $i++) { 
            if($dateDuDernierSerie >= $series[$i]->getDateSortie()) {

                if(count($newSeries) >= 5) {

                    for ($j=0; $j < count($newSeries); $j++) { 

                        if ($newSeries[$j]->getDateSortie() < $series[$i]->getDateSortie())
                        {
                            unset($newSeries[$j]);
                            array_unshift($newSeries, $series[$i]);
                            break;
                        }

                    }

                    continue;
                }

                $newSeries[] = $series[$i];
            }
        }

        $mergedNews = array_merge($newFilms, $newSeries);


        $dateDuDernierProduit = $mergedNews[0]->getDateSortie();

        $news = [];

        for ($i=0; $i < count($mergedNews); $i++) { 
            if( $mergedNews[$i]->getDateSortie() > $dateDuDernierProduit ){
                $dateDuDernierProduit = $mergedNews[$i]->getDateSortie();
            }
        }

        for ($i=0; $i < count($mergedNews); $i++) { 
            if($dateDuDernierProduit >= $mergedNews[$i]->getDateSortie()) {

                if(count($news) >= 7) {

                    for ($j=0; $j < count($news); $j++) { 

                        if ($news[$j]->getDateSortie() < $mergedNews[$i]->getDateSortie())
                        {
                            unset($news[$j]);
                            array_unshift($news, $mergedNews[$i]);
                            break;
                        }

                    }

                    continue;
                }

                $news[] = $mergedNews[$i];
            }
        }

        dd($news, $mergedNews);

        return $this->render("base.html.twig", [
            "news" => $news,
        ]);
    }
}
