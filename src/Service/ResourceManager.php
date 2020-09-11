<?php

namespace App\Service;

use App\Entity\Resource;
use Doctrine\ORM\EntityManagerInterface;

class ResourceManager
{
    protected EntityManagerInterface $entityManager;
    protected string $resourceRootPath;

    public function __construct(EntityManagerInterface $entityManager, string $resourceRootPath)
    {
        $this->entityManager = $entityManager;
        $this->resourceRootPath = $resourceRootPath;
    }

    private function resolveResourcePath(Resource $resource)
    {
        return join(DIRECTORY_SEPARATOR, [$this->resourceRootPath, $resource->getContainer()->getPathPrefix(), $resource->getFilename()]);
    }

    public function getRootPath(): string
    {
        return $this->resourceRootPath;
    }

    public function get(int $id)
    {
        $resource = $this->entityManager->getRepository(Resource::class)->find($id);

        if (!$resource) {
            throw new \Exception("No Resource with ID " . $id . " found.");
        }

        return $resource;
    }

    public function getResourcePath(Resource $resource)
    {
        return $this->resolveResourcePath($resource);
    }
}
