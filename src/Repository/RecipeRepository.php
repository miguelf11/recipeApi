<?php

namespace App\Repository;

use App\Domain\Repository\RecipeRepositoryInterface;
use GuzzleHttp\Client;

class RecipeRepository implements RecipeRepositoryInterface
{
    const API_URL = 'http://www.recipepuppy.com/api';

    /**
     * @param string|null $query
     *
     * @return array
     */
    public function search(?string $query): array
    {
        $client = new Client();

        $queryParams = ['query' => ['q' => $query]];
        $res = $client->request('GET', self::API_URL, $queryParams);
        $res = json_decode($res->getBody());

        return $res->results;
    }
}
