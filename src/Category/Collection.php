<?php

namespace App\Category;

final class Collection implements \IteratorAggregate
{
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

    public function getCategoryByName($name)
    {
        foreach ($this->categories as $category) {
            if($category->getTitle() === $name) {
                return $category;
            }
        }
    }

}
