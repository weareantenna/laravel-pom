<?php

namespace Antenna\PomAPI;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;


class Authenticate
{
    public static function authenticate()
    {
        $client = new Client([
            'base_uri' => config('pomapi.pom_base_url'),
            'verify' => false
        ]);

        try{
            $response = $client->request('POST', '/users/session', [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'json' => [
                    'username' => config('pomapi.pom_username'),
                    'password' => config('pomapi.pom_password'),
                    'expiresIn' => (60 * 5),
                    'platform' => 'Inovim',
                    'appName' => 'POM-Sender',
                    'environmentId' => 'N/A',
                ]
            ]);
            return json_decode($response->getBody(), true);
        }
        catch (GuzzleException $e){
            return  response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
