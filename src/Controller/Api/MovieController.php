<?php

namespace App\Controller\Api;

use App\Entity\Movie;
use App\Service\MovieManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/movies", name="api_movies_")
 */
class MovieController extends AbstractController
{
    /**
     * @Route("/", name="all_movies")
     */
    public function index(SerializerInterface $serializer)
    {
        $movies = $this->getDoctrine()->getRepository(Movie::class)->findAll();

        if (!$movies) {
            throw new NotFoundHttpException("Inga filmer hittades.");
        }



        return new Response($serializer->serialize($movies, "json"));
    }
}
