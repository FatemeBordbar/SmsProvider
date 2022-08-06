<?php

namespace App\SmsProviders;


class SmsGatewayProvider
{

    public function specifyActiveProvider()
    {
        $providers = config('sms_provider.providers');
        $provider  = config('sms_provider.default');
        $provider_classes = config('sms_provider.map');

        foreach ($providers as $items => $item) {
            if ($item['activate']) {
                $provider = $item;
            }
        }

        return new ($provider_classes[$provider]);
    }
}
