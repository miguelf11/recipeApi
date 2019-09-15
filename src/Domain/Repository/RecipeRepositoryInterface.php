<?php

namespace App\Domain\Repository;

interface RecipeRepositoryInterface
{
    public function search(string $query): array;
}
