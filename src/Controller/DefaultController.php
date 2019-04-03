<?php

namespace App\Controller;

use App\Post\Service\PostPresentationServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    private $postPresentationService;

    public function __construct(PostPresentationServiceInterface $postPresentationService)
    {

        $this->postPresentationService = $postPresentationService;
    }
    /**
     * Renders site home page.
     *
     * @return Response
     */
    public function index(): Response
    {

        $posts = $this->postPresentationService->getPosts();
        return $this->render('default/index.html.twig', [
            'posts' => $posts,
        ]);
    }
}
