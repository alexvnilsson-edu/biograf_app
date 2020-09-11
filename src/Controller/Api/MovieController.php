<?php

namespace App\Controller\Api;

use App\Entity\Movie;
use App\Service\MovieManager;
use App\Service\ResourceManager;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
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
            return new JsonResponse([
                "items" => array(),
                "error" => "No movies found."
            ]);
        }

        return new JsonResponse(["items" => json_decode($serializer->serialize($movies, "json"))]);
    }

    /**
     * @Route("/{id}/cover", name="movie_cover")
     */
    public function movie_cover(ResourceManager $resources, int $id)
    {
        $movie = $this->getDoctrine()->getRepository(Movie::class)->find($id);

        if (!$movie) {
            throw new Exception("Movie with ID " . $id . " not found.");
        }
        
        $coverImage = $resources->get($id);
        $coverImagePath = $resources->getResourcePath($coverImage);

        return new BinaryFileResponse($coverImagePath);
    }
}
