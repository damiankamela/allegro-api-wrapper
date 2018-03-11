<?php

namespace App\Http\Controllers;

use App\Security\AccessTokenProvider;
use GuzzleHttp\ClientInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Client;

class OauthController extends Controller
{
    /** @var ClientInterface */
    protected $client;

    /** @var AccessTokenProvider */
    protected $accessTokenProvider;

    public function __construct(ClientInterface $client, AccessTokenProvider $accessTokenProvider)
    {
        $this->client = $client;
        $this->accessTokenProvider = $accessTokenProvider;
    }


    public function login()
    {
        return redirect(sprintf(
            'https://allegro.pl/auth/oauth/authorize?response_type=code&client_id=%s&api-key=%s&redirect_uri=%s',
            env('ALLEGRO_API_CLIENT_ID'),
            env('ALLEGRO_API_KEY'),
            env('ALLEGRO_API_REDIRECT_URI')
        ));
    }

    public function oauthCallback(Request $request, Session $session)
    {
        $authorizationCode = $request->query('code');
        $accessToken = $this->accessTokenProvider->getAccessToken($authorizationCode);

        $session->set('api_access_token', $accessToken);

        redirect(route('homepage'));
    }
}