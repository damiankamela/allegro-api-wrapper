<?php

namespace App\Http\Controllers;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use Symfony\Component\HttpFoundation\Session\Session;

class HomepageController extends Controller
{
    /** @var ClientInterface */
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }


    public function welcome(Session $session)
    {
        if ($session->has('api_access_token')) {
            $accessToken = $session->get('api_access_token');

            try {
                $response = $this->client->request('GET', 'https://api.allegro.pl/sale/offer-contacts', [
                'headers' => [
                    'Authorization' => 'bearer ' . $accessToken,
                    'Api-Key' => env('ALLEGRO_API_KEY'),
                    'Accept' => 'application/vnd.allegro.public.v1+json'
                ],
                'form_params' => [
                    'seller.id' => 22944282
                ]
            ]);
            } catch (ClientException $exception) {
                dd(json_decode($exception->getResponse()->getBody(), true));
                dd($exception->getMessage());
            }

            $result = json_decode($response, true);

            dd($result);
        } else {
            return view('welcome');
        }
    }
}