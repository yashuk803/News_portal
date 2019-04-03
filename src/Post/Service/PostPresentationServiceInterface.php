<?php

namespace App\Post\Service;

use App\Post\Collection;

interface PostPresentationServiceInterface
{
    public function getPosts(): Collection;
}
