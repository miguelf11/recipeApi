<?php

namespace App\Domain\Services;

use App\Domain\Repository\RecipeRepositoryInterface;

class RecipeService
{
    private $recipeRepository;

    /**
     * @param RecipeRepositoryInterface $songRepository
     */
    public function __construct(RecipeRepositoryInterface $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    /**
     * @param string|null $query
     *
     * @return array
     */
    public function search(?string $query)
    {
        return $this->recipeRepository->search($query);
    }
}
