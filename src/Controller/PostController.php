<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

final class PostController extends AbstractController
{
    #[Route('/api/post', name: 'api_post_index', methods: ['GET'])]
    public function index(PostRepository $postRepository, SerializerInterface $serializer): JsonResponse
    {
        $posts = $postRepository->findAll();

        return $this->json([
            'posts' => $serializer->normalize($posts, 'json')
        ]);
    }
}
