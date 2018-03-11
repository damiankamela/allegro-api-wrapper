<?php

namespace App\Security;

use GuzzleHttp\ClientInterface;

class AccessTokenProvider
{
    /**
     * @var ClientInterface
     */
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function getAccessToken(string $authorizationCode): string
    {
        $response = $this->client->request('POST', 'https://allegro.pl/auth/oauth/token', [
            'headers' => [
                'Authorization' =>
                    'Basic ' . base64_encode(env('ALLEGRO_API_CLIENT_ID') . ':' . env('ALLEGRO_API_CLIENT_SECRET')),

            ],
            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => $authorizationCode,
                'api_key' => env('ALLEGRO_API_KEY'),
                'redirect_uri' => env('ALLEGRO_API_REDIRECT_URI'),
            ],
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['access_token'];
    }
}