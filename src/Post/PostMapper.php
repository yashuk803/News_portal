<?php

namespace App\Post;

use App\Entity\Post;

final class PostMapper
{
    public static function entityToModel(Post $entity): PostModel
    {
        $model = new PostModel(
            $entity->getId(),
            $entity->getCategory(),
            $entity->getTitle(),
            $entity->getPublicationDate()
        );

        $model->setShortDescription($entity->getShortDescription());
        $model->setImage($entity->getImage());

        return $model;
    }
}
