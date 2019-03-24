<?php

namespace App\Category\Service;

use App\Category\CategoryModel;
use App\Category\Collection;

final class FakeCategoryPageService implements CategoryPageServiceInterface
{
    /**
     * Count generation fake categories
     *
     * @var int
     */
    private $categoriesLimit;

    const CATEGORY_WORLD = 'World';
    const CATEGORY_SPORT = 'Sport';
    const CATEGORY_IT = 'IT';
    const CATEGORY_SCINCE = 'Science';

    /**
     * Constructor.
     *
     * @param int $categoriesLimit this param is set in services.yaml
     * (app.category_page_categories_limit = 4)
     */
    public function __construct(int $categoriesLimit)
    {
        $this->categoriesLimit = $categoriesLimit;
    }

    /**
     * Method for generated fake categories.
     * Use library Faker
     *
     * @return Collection
     */
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
                    self::CATEGORY_SCINCE,
                ]),
                $faker->realText(1000, 1)
            );
            $collection->addCategory($category);
        }

        return $collection;
    }
}
