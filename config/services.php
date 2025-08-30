<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'fitroom' => [
        'api_key' => env('FITROOM_API_KEY'),
        'base_url' => env('FITROOM_BASE_URL', 'https://platform.fitroom.app/api'),
        'max_polling_attempts' => env('FITROOM_MAX_POLLING_ATTEMPTS', 60),
        'initial_delay' => env('FITROOM_INITIAL_DELAY', 2),
    ],

    'fashn' => [
        'api_key' => env('FASHN_API_KEY'),
    ],
    'sizeyou' => [
        'token' => env('SIZEYOU_TOKEN'),
    ],
    'google' => [
        'maps_api_key' => env('GOOGLE_MAPS_API_KEY'),
    ],



];
