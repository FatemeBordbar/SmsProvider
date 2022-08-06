<?php

namespace App\Component;

use App\Models\SmsItem;
use App\Patterns\Repository;
use App\SmsProviders\SmsGatewayProvider;

class SmsProvider
{
    protected  $model, $repository;

    function __construct(SmsItem $model)
    {
        $this->repository = new Repository($model);
        $this->model = $model;
    }

    public static function sendSMS($to , $message){

        $sms_gateway_provider = new SmsGatewayProvider();
        $sms_provider  = $sms_gateway_provider->specifyActiveProvider();

        $result = $sms_provider->send($to, $message);

        $repository = resolve(Repository::class);
        $sms_item   = $repository->create($result);

        return $sms_item;
    }
}
