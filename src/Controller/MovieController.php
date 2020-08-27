<?php

namespace App\Controller;

use App\Service\MovieManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    /**
     * @Route("/movie", name="movie")
     */
    public function index(MovieManager $movieManager)
    {        
        $movies = $movieManager->getMovies();
        $response = new Response(print_r($movies));

        return $response;
    }
}
