<?php

namespace App\SmsProviders;

interface SmsProviderInterface
{
    public function send(string $recipient, string $message);

}
