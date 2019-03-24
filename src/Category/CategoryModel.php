<?php

namespace App\Category;

final class CategoryModel
{
    private $id;
    private $title;
    private $description;

    public function __construct(
        int $id,
        string $title,
        string $description
    ) {
        $this->id = $id;
        $this->description = $description;
        $this->title = $title;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
}
