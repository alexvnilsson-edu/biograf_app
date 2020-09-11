<?php

namespace App\Controller;

use App\Service\ResourceManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/resources", name="resource_")
 */
class ResourceController extends AbstractController
{
    protected ResourceManager $resources;

    public function __construct(ResourceManager $resourceManager)
    {
        $this->resources = $resourceManager;
    }

    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('resource/index.html.twig', [
            'controller_name' => 'ResourceController',
        ]);
    }

    /**
     * @Route("/{resourceId}", name="get_resource")
     */
    public function get_resource(int $resourceId)
    {
        //return new JsonResponse(["resource_root_path" => $this->resources->getRootPath()]);
        $resource = $this->resources->get($resourceId);

        return new JsonResponse(["path" => $this->resources->getResourcePath($resource)]);
    }
}
