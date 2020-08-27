<?php

namespace App\Controller\Api;

use App\Service\MovieManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/filmer", name="api_movies_")
 */
class MovieController extends AbstractController
{
    /**
     * @Route("/", name="all_movies")
     */
    public function index(MovieManager $movieManager)
    {        
        $movies = $movieManager->getMovies();
        $response = new Response(print_r($movies));

        return $response;
    }
}
