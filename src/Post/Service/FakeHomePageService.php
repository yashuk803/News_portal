<?php

namespace App\Post\Service;

use App\Post\Collection;
use App\Post\PostModel;

final class FakeHomePageService implements HomePageServiceInterface
{
    private $postsLimit;

    public function __construct(int $postsLimit)
    {
        $this->postsLimit = $postsLimit;
    }

    public function getPosts(): Collection
    {

        $collection = new Collection();
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < $this->postsLimit; $i++) {
            $post = new PostModel(
                $faker->randomDigit,
                $faker->randomElement(['World', 'Sport', 'IT', 'Science']),
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
