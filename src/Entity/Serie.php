<?php

namespace App\Entity;

use App\Repository\SerieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SerieRepository::class)]
class Serie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $titre = null;

    #[ORM\Column(nullable: true)]
    private ?float $rating = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateSortie = null;

    #[ORM\Column(length: 100)]
    private ?string $pays = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $genre = [];

    #[ORM\Column(length: 100)]
    private ?string $realisateur = null;

    #[ORM\Column(length: 100)]
    private ?string $studio = null;

    #[ORM\Column(length: 255)]
    private ?string $affiche = null;

    #[ORM\Column(length: 450)]
    private ?string $videoSource = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $episodes = [];


    public function __construct()
    {
        $this->dateSortie = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(float $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeImmutable
    {
        return $this->dateSortie;
    }

    public function setDateSortie(\DateTimeImmutable $dateSortie): static
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getGenre(): array
    {
        return $this->genre;
    }

    public function setGenre(array $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getRealisateur(): ?string
    {
        return $this->realisateur;
    }

    public function setRealisateur(string $realisateur): static
    {
        $this->realisateur = $realisateur;

        return $this;
    }

    public function getStudio(): ?string
    {
        return $this->studio;
    }

    public function setStudio(string $studio): static
    {
        $this->studio = $studio;

        return $this;
    }

    public function getAffiche()
    {
        return $this->affiche;
    }

    public function setAffiche($affiche): static
    {
        $this->affiche = $affiche;

        return $this;
    }

    public function getVideoSource(): ?string
    {
        return $this->videoSource;
    }

    public function setVideoSource(string $src): static
    {
        $this->videoSource = $src;

        return $this;
    }

    public function getEpisodes(): array
    {
        return $this->episodes;
    }

    public function setEpisodes(array $episodes): static
    {
        $this->episodes = $episodes;

        return $this;
    }

}
