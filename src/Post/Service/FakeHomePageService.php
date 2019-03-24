<?php

namespace App\Post\Service;

use App\Post\Collection;
use App\Post\PostModel;

final class FakeHomePageService implements HomePageServiceInterface
{
    /**
     * Count generation fake posts
     * @var int
     */
    private $postsLimit;

    const CATEGORY_WORLD = 'World';
    const CATEGORY_SPORT = 'Sport';
    const CATEGORY_IT = 'IT';
    const CATEGORY_SCINCE = 'Science';

    /**
     * Constructor.
     * @param int $postsLimit this param is set in services.yaml
     * (app.home_page_posts_limit = 10)
     */
    public function __construct(int $postsLimit)
    {
        $this->postsLimit = $postsLimit;

    }

    /**
     * Method for generated fake posts.
     * Use library Faker
     *
     * @return Collection
     */
    public function getPosts(): Collection
    {

        $collection = new Collection();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < $this->postsLimit; $i++) {
            $post = new PostModel(
                $faker->randomDigit,
                $faker->randomElement([
                    self::CATEGORY_WORLD,
                    self::CATEGORY_SPORT,
                    self::CATEGORY_IT,
                    self::CATEGORY_SCINCE
                ]),
                $faker->sentence,
                $faker->dateTime
            );
            $post
                ->setShortDescription($faker->sentence(30))
                ->setImage($faker->imageUrl())
            ;
            $collection->addPost($post);
        }

        return $collection;
    }
}
