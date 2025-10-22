<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Film;
use App\Entity\Serie;
use App\Entity\Episode;
use App\Entity\Genre;
use Faker\Factory;
use Faker\Generator;


class AppFixtures extends Fixture
{
    private Generator $faker;

    public function __construct(){
        $this->faker = Factory::create("fr_FR");
    }


    public function load(ObjectManager $manager): void
    {
        $genre = new Genre();
        $genre->setNom("Thriller");

        $manager->persist($genre);

        $genre = new Genre();
        $genre->setNom("Action");

        $manager->persist($genre);

        $genre = new Genre();
        $genre->setNom("Comédie");

        $manager->persist($genre);

        $genre = new Genre();
        $genre->setNom("Science-fiction");

        $manager->persist($genre);

        $genre = new Genre();
        $genre->setNom("Documentaire");

        $manager->persist($genre);

        

        for($i = 0; $i < 6; $i++) {
            $film = new Film();

            $film->setTitre($this->faker->word());
            $film->setDateSortie(new \DateTimeImmutable($this->faker->date()));
            $film->setPays($this->faker->country());
            $film->setGenre(mt_rand(0,1) ? [0,2,4] : [1,3,0]);
            $film->setRealisateur($this->faker->firstName() . " " . $this->faker->lastName());
            $film->setStudio(mt_rand(0,1) ? "Paramount" : "Universal Pictures");
            $film->setVideoSource(mt_rand(0,1) ? "films/0/video-source.mp4" : "films/1/video-source.mp4");
            $film->setAffiche(mt_rand(0,1) ? "films/0/affiche.webp" : "films/1/affiche.jpg");

            $manager->persist($film);
        }

        for($i = 0; $i < 6; $i++) {
            $serie = new Serie();

            $serie->setTitre($this->faker->word());
            $serie->setDateSortie(new \DateTimeImmutable($this->faker->date()));
            $serie->setPays($this->faker->country());
            $serie->setGenre(mt_rand(0,1) ? [0,2,4] : [1,3,0]);
            $serie->setRealisateur($this->faker->firstName() . " " . $this->faker->lastName());
            $serie->setStudio(mt_rand(0,1) ? "Paramount" : "Universal Pictures");
            $serie->setVideoSource(mt_rand(0,1) ? "series/0" : "series/1");
            $serie->setAffiche(mt_rand(0,1) ? "series/0/affiche.jpg" : "series/1/affiche.jpg");

            $manager->persist($serie);
        }

        $manager->flush();
    }
}
