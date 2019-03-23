<?php

namespace App\Post;

final class PostModel
{
    private $id;
    private $category;
    private $title;
    private $shortDescription;
    private $image;
    private $publicationDate;

    public function __construct(
        int $id,
        string $category,
        string $title,
        \DateTimeInterface $publicationDate
    ) {
        $this->id = $id;
        $this->category = $category;
        $this->title = $title;
        $this->publicationDate = $publicationDate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;
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
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    public function setShortDescription($shortDescription): self
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }
    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;
        return $this;
    }

    public function getPublicationDate(): \DateTimeInterface
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(\DateTimeInterface $publicationDate): self
    {
        $this->publicationDate = $publicationDate;
        return $this;
    }
}
