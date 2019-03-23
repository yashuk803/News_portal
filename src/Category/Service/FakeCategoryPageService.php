<?php

namespace App\Category\Service;

use App\Category\CategoryModel;
use App\Category\Collection;

final class FakeCategoryPageService implements CategoryPageServiceInterface
{
    private $categoriesLimit;

    const CATEGORY_WORLD = 'World';
    const CATEGORY_SPORT = 'Sport';
    const CATEGORY_IT = 'IT';
    const CATEGORY_SCINCE = 'Science';

    public function __construct(int $categoriesLimit = 4)
    {
        $this->categoriesLimit = $categoriesLimit;
    }

    public function getCategories(): Collection
    {
        $collection = new Collection();
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < $this->categoriesLimit; $i++) {
            $category = new CategoryModel(
                $faker->randomDigit,
                $faker->unique()->randomElement([
                    self::CATEGORY_WORLD,
                    self::CATEGORY_SPORT,
                    self::CATEGORY_IT,
                    self::CATEGORY_SCINCE
                ]),
                $faker->realText(1000, 1)
            );
            $collection->addCategory($category);
        }

        return $collection;
    }
}