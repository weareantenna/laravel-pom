<?php

namespace Antenna\PomAPI;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Paylink
{
    public static function getPaylink(string $token, float $amount, string $firstname, string $lastname, string $email, string $documentId, string $ogm)
    {
        $client = new Client([
            'base_uri' => config('pomapi.pom_base_url'),
            'verify' => false
        ]);

        try {
            $response = $client->request('POST', '/senders/' . config('pomapi.pom_sender_id') . '/createPaylink', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'X-Authentication' => $token,
                ],
                'json' => [
                    'senderContractNumber' => config('pomapi.pom_scn'),
                    'senderBankaccount' => config('pomapi.pom_iban'),
                    'documentId' => $documentId,
                    'documentTitle' => 'Aanzuiveren afvalrekening ILvA',
                    'amount' => $amount,
                    'currency' => 'EUR',
                    'documentDate' => null,
                    'dueDate' => date('Y-m-d', time() + (24 * 60 * 60)),
                    'memoDate' => null,
                    'documentType' => 'Invoice',
                    'endPoint'  => null,
                    'externalUrl' => null,
                    'documentFileName' => null,
                    'communicationStructured' => $ogm,
                    'communicationPart1' => null,
                    'customerId' => 'Ilva',
                    'firstName' => $firstname,
                    'lastName' => $lastname,
                    'companyName' => null,
                    'companyNumber' => null,
                    'email' => $email,
                    'address' => [
                        'street1' => null,
                        'street2' => null,
                        'zipCode' => null,
                        'city' => null
                    ],
                    'socialSecurityNumber' => null,
                    'paymentMethod' => null,
                    'bankAccountNumbers' => null,
                    'expiryDate' => null,
                    'language' => 'nl_BE',
                ]
            ]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) {
            return  response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public static function getPaylink2(string $token, $arguments)
    {
        $client = new Client([
            'base_uri' => config('pomapi.pom_base_url'),
            'verify' => false
        ]);

        try {
            $response = $client->request('POST', '/senders/' . config('pomapi.pom_sender_id') . '/createPaylink', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'X-Authentication' => $token,
                ],
                'json' => $arguments,
            ]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) {
            return  response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
