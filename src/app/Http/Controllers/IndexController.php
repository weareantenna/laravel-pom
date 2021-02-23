<?php

namespace App\Http\Controllers;

use Antenna\PomAPI\PomApi;

class IndexController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function authenticate()
    {
        return PomApi::authenticate();
    }

    //Only neccesarry options
    public function getPaylink()
    {
        $token = PomApi::authenticate()['authToken'];
        $amount = 5.43;
        $firstname = 'test';
        $lastname = 'test';
        $email = 'test@test.be';
        $documentId = '602bf62a8fd96';
        $ogm = '+++116/0773/21416+++';

        return PomApi::getPaylink($token, $amount, $firstname, $lastname, $email, $documentId, $ogm);
    }

    //All options
    public function getPaylink2()
    {
        $token = PomApi::authenticate()['authToken'];
        $amount = 5.43;
        $firstname = 'test';
        $lastname = 'test';
        $email = 'test@test.be';
        $documentId = '602bf62a8fd96';
        $ogm = '+++116/0773/21416+++';
        $arguments = [
            'senderContractNumber' => config('pomapi.pom_scn'),
            'senderBankaccount' => config('pomapi.pom_iban'),
            'documentId' => null,
            'documentTitle' => 'Aanzuiveren afvalrekening ILvA',
            'amount' => $amount,
            'currency' => 'EUR',
            'documentDate' => null,
            'dueDate' => date('Y-m-d', time() + (24 * 60 * 60)),
            'memoDate' => null,
            'documentType' => 'Invoice',
            'endPoint' => null,
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
        ];

        return PomApi::getPaylink2($token, $arguments);
    }

    public function getPaymentStatus()
    {
        $token = PomApi::authenticate()['authToken'];
        $documentId = '602bf62a8fd96';
        return PomApi::getPaymentStatus($token, $documentId);
    }
}
