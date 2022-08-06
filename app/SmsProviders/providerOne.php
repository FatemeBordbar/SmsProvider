<?php

namespace App\SmsProviders;


class providerOne implements SmsProviderInterface
{
    public function send(string $to, string $message): array
    {
        $soapClientObj = new \SoapClient(config()->get('providers.provider_one')['server']);

        $parameters = self::createSoapClientObj($to, $message);
        $doSendSMS = $soapClientObj->doSendSMS($parameters);
        return self::getSoapClientResult($doSendSMS);
    }

    public static function createSoapClientObj($number, $message): array
    {
        return array(
            "uUsername" => config()->get('providers.provider_one')['username'],
            "uPassword" => config()->get('providers.provider_one')['password'],
            "uCellphones" => $number,
            "uNumber" => config()->get('providers.provider_one')['server'],
            "uMessage" => $message,
            "uFarsi" => true,
            "uTopic" => false,
            "uFlash" => "",
            "uUDH" => ""
        );
    }

    public static function getSoapClientResult($doSendSMS)
    {
        $send_result = $doSendSMS->doSendSMSResult;
        return [
            'state' => $send_result['send_ok'] ? 'sent' : 'failed',
            'return_id' => $send_result['return_id'],
            'provider' => 'providerOne'
        ];
    }

}
