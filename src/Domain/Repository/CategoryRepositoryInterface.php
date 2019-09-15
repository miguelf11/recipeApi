<?php

namespace App\Domain\Repository;

interface CategoryRepositoryInterface
{
    public function search(string $query): array;
}
