<?php

namespace App\Controller;

use App\Category\Service\CategoryPageServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends AbstractController
{
    /**
     * Renders site category page.
     * Matches /category/*.
     *
     * @Route("/category/{name}", name="category_show")
     * @return Response
     */
    public function show(CategoryPageServiceInterface $categoryPageService, $name): Response
    {
        $category = $categoryPageService->getCategories()->getCategoryByName($name);
        if(!$category) {
            throw $this->createNotFoundException('The category does not exist');
        }

        return $this->render('category/index.html.twig', [
            'category' => $category,
        ]);
    }
}
