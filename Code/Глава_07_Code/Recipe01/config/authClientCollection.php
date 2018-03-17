<?php

return [
    'class' => 'yii\authclient\Collection',
    'clients' => [
        'google' => [
            'class' => 'yii\authclient\clients\GoogleOpenId'
        ],
        'github' => [
            'class' => 'yii\authclient\clients\GitHub',
            'clientId' => '87f0784aae2ac48f78a',
            'clientSecret' => 'fb5953a54dea4640f3a70d8abd96fbd25592ff18',
        ],
    ],
];