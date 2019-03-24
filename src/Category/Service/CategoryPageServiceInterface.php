<?php

namespace App\Category\Service;

use App\Category\Collection;

interface CategoryPageServiceInterface
{
    /**
     * Return all generated categories
     *
     * @return Collection
     */
    public function getCategories(): Collection;
}
