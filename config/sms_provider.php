<?php

return [

    'default' => 'provider_one',
    'providers' => [
        'provider_one' => [
            'username ' => '500012188614156',
            'password' => '80818337',
            'sender_number' => '500012188614156',
            'server' => 'http://www.linepayamak.ir/Post/Send.asmx?wsdl',
            'activate' => true
        ],

        'provider_two' => [
            'username ' => '500012188614156',
            'password' => '80818337',
            'sender_number' => '500012188614156',
            'server' => 'http://www.linepayamak.ir/Post/Send.asmx?wsdl',
            'activate' => false
        ],
    ],

    'map' => [
        'provider_one' => \App\SMS\provider_one::class,
        'provider_two' => \App\SMS\provider_two::class,
    ],
];
