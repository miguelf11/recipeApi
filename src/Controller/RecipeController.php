<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Domain\Services\RecipeService;
use Symfony\Component\HttpFoundation\JsonResponse;

class RecipeController
{
    /**
     * @var RecipeService
     */
    private $recipeService;

    /**
     * @param RecipeService $votingService
     */
    public function __construct(RecipeService $recipeService)
    {
        $this->recipeService = $recipeService;
    }

    /**
     * @Route("/recipe/", name="get_recipe")
     *
     * @param Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function get(Request $request)
    {
        $query = $request->query->get('q');

        return new JsonResponse($this->recipeService->search($query));
    }
}
