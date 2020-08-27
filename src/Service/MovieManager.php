<?php

namespace App\Service;

use App\Entity\Filmtitel;
use App\Entity\Filmtitelomslag;
use Psr\Log\LoggerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Filesystem\Exception\IOException;

class MovieManager {
    protected $entityManager;
    protected $logger;

    public function __construct(EntityManagerInterface $entityManager, LoggerInterface $logger) {
        $this->entityManager = $entityManager;
        $this->logger = $logger;

        $serviceClass = get_class($this);
        $this->logger->info("[$serviceClass] Constructed.");
    }

    public function getMovies() {
        $repo = $this->entityManager->getRepository(Filmtitel::class);
        $movies = $repo->findAll();
        return $movies;
    }

    public function getMoviePoster($id) {
        $moviePosters = $this->entityManager->getRepository(Filmtitelomslag::class)->findBy([
            "FilmTitelID" => $id
        ]);

        $moviePoster = $moviePosters[0]; // @todo: Prioritera omslag?
        $moviePosterFilename = $moviePoster->bildfilnamn;

        $moviePosterPathPrefix = $_SERVER["MOVIE_MANAGER_COVER_PATH"];
        $moviePosterPath = "$moviePosterPathPrefix/$moviePosterFilename";

        if (!file_exists($moviePosterPath)) {
            throw new IOException("$moviePosterPath finns inte.", 0, null, $moviePosterPath);
        }

        return $moviePosterPath;
    }
}