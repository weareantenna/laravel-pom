<?php

namespace Antenna\PomAPI;

use Faker\Provider\Payment;

class PomApi
{
    public static function authenticate()
    {
        return Authenticate::authenticate();
    }

    public static function getPaylink(string $token, float $amount, string $firstname, string $lastname, string $email, string $documentId, string $ogm)
    {
        return Paylink::getPaylink($token, $amount, $firstname, $lastname, $email, $documentId, $ogm);
    }

    public static function getPaylink2(string $token, $arguments)
    {
        return Paylink::getPaylink2($token, $arguments);
    }

    public static function getPaymentStatus(string $token, string $documentId)
    {
        return PaymentStatus::getPaymentStatus($token, $documentId);
    }
}
