<?php

namespace Antenna\PomAPI;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

class PaymentStatus{

    public static function getPaymentStatus(string $token, string $documentId)
    {

        $client = new Client([
            'base_uri' => config('pomapi.pom_base_url'),
            'verify' => false
        ]);

        try{
            $response = $client->request('GET', '/senders/' . config('pomapi.pom_sender_id') . '/paymentStatus/' . $documentId, [
                'headers' => [
                    'X-Authentication' => $token,
                ],
            ]);
            return json_decode($response->getBody(), true);
        }
        catch (ClientException $e){
            $response = $e->getResponse();
            return response()->json(json_decode($response->getBody(), true), $response->getStatusCode());
        }
        catch (GuzzleException $e){
            return  response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
