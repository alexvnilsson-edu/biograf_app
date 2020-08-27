<?php

namespace App\Service;

use App\Entity\Filmtitel;
use Psr\Log\LoggerInterface;
use Doctrine\ORM\EntityManagerInterface;

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
}