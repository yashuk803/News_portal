<?php

namespace App\Post;

final class Collection implements \IteratorAggregate
{
    /**
     * @var PostModel[]
     */
    private $posts;

    public function __construct(PostModel ...$posts)
    {
        $this->posts = $posts;
    }

    public function addPost(PostModel $post)
    {
        $this->posts[] = $post;
    }

    /**
     * This method return one post for
     * block top post
     *
     * @return PostModel|null
     */
    public function getOneFromTop(): ?PostModel
    {
        return \array_shift($this->posts);
    }

    /**
     * This method generated different number of posts
     *
     * @param int $quantity
     * @return iterable
     */
    public function getFromTop(int $quantity = 1): iterable
    {
        for ($i = 0; $i < $quantity; $i++) {
            yield \array_shift($this->posts);
        }
    }

    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->posts);
    }
}
