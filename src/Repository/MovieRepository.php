<?php

namespace App\Repository;

use App\Entity\Movie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Repositorium av metoder för databehandling av entiteter av typen Movie.
 *
 * @author Alexander Nilsson
 * @see \App\Entity\Movie
 */
class MovieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Movie::class);
    }

    /**
     * MovieRepository findAll
     */
    public function findAll() {

    }
}
