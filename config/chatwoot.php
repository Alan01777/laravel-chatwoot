<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Chatwoot API Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your Chatwoot API credentials and other settings.
    |
    */

    'default' => env('CHATWOOT_DEFAULT_ACCOUNT', 'default'),

    'accounts' => [
        'default' => [
            'base_url' => env('CHATWOOT_BASE_URL', 'https://app.chatwoot.com'),
            'account_id' => env('CHATWOOT_ACCOUNT_ID'),
            'api_access_token' => env('CHATWOOT_API_ACCESS_TOKEN'),
        ],
    ],
];

