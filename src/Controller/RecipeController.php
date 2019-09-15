<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;

class RecipeController
{
    const API_URL = 'http://www.recipepuppy.com/api';

    /**
     * @Route("/recipe/", name="get_recipe")
     *
     * @param Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function get(Request $request)
    {
        $client = new Client();

        $queryParams = ['query' => ['q' => $request->query->get('q')]];
        $res = $client->request('GET', self::API_URL, $queryParams);

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $res = json_decode($res->getBody());

        return $response->setContent(json_encode($res->results), true);
    }
}
