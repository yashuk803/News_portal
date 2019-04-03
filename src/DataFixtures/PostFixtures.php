<?php

namespace App\DataFixtures;

use App\Category\Repository\CategoryRepositoryInterface;
use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class PostFixtures extends Fixture implements OrderedFixtureInterface
{

    private $categoryPresentattion;

    public function __construct(CategoryRepositoryInterface  $categoryPresentattion)
    {
        $this->categoryPresentattion = $categoryPresentattion;
    }

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $post = new Post();
            $category = $this->categoryPresentattion->findAll();

            $nCategory = $faker->numberBetween(0, (count($category)-1));
            $post->setTitle($faker->sentence(10));
            $post->setCategory($category[$nCategory]);
            $post->setShortDescription($faker->sentence(20));
            $post->setPublicationDate($faker->dateTimeAd());
            $post->setImage($faker->imageUrl());
            $manager->persist($post);
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 2;
    }
}
