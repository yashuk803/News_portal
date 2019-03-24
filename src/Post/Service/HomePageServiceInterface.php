<?php

namespace App\Post\Service;

use App\Post\Collection;

interface HomePageServiceInterface
{
    /**
     * Return all generated posts
     *
     * @return Collection
     */
    public function getPosts(): Collection;
}
