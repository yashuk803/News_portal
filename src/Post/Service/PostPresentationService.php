<?php

namespace App\Post\Service;

use App\Post\PostMapper;
use App\Post\Collection;
use App\Post\Repository\PostRepositoryInterface;

final class PostPresentationService implements PostPresentationServiceInterface
{
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }


    public function getPosts(): Collection
    {
        $posts = $this->postRepository->findAll();
        $collection = new Collection();

        foreach ($posts as $post) {
            $collection->addPost(
                PostMapper::entityToModel($post)
            );
        }

        return $collection;
    }
}
