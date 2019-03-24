<?php

namespace App\Category;

final class Collection implements \IteratorAggregate
{
    /**
     * @var CategoryModel[]
     */
    private $categories;

    public function __construct(CategoryModel ...$categories)
    {
        $this->categories = $categories;
    }

    public function addCategory(CategoryModel $categories)
    {
        $this->categories[] = $categories;
    }

    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->categories);
    }

    /**
     * Return null or one category
     * in array CategoryModel
     *
     * @param $name
     *
     * @return null|CategoryModel
     */
    public function getCategoryByName($name): ?CategoryModel
    {
        foreach ($this->categories as $category) {
            if ($category->getTitle() === $name) {
                return $category;
            }
        }
    }
}
