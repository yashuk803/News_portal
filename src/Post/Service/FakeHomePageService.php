<?php

namespace App\Post\Service;

use App\Post\Collection;
use App\Post\PostModel;
use Psr\Log\LoggerInterface;

final class FakeHomePageService implements HomePageServiceInterface
{
    private $logger;
    private $postsLimit;

    const CATEGORY_WORLD = 'World';
    const CATEGORY_SPORT = 'Sport';
    const CATEGORY_IT = 'IT';
    const CATEGORY_SCINCE = 'Science';

    public function __construct(int $postsLimit, LoggerInterface $logger)
    {
        $this->postsLimit = $postsLimit;
        $this->logger = $logger;
    }
    public function getPosts(): Collection
    {
        $this->logger->debug('Called fake home page service');

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
