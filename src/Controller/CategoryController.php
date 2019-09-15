<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Domain\Services\CategoryService;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoryController
{
    /**
     * @var CategoryService
     */
    private $categoryService;

    /**
     * @param CategoryService $votingService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Find the recipes in a category.
     *
     * @Route("/category/", name="recipes_in_category")
     *
     * @param Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function get(Request $request)
    {
        $query = $request->query->get('q');

        return new JsonResponse($this->categoryService->search($query));
    }
}
