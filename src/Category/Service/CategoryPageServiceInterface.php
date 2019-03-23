<?php

namespace App\Category\Service;

use App\Category\Collection;

interface CategoryPageServiceInterface
{
    public function getCategories(): Collection;
}
