<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */
    /**
     * socialite Settings
     */
    'twitter' => [
        'client_id'     => env('TWITTER_API_KEY'),
        'client_secret' => env('TWITTER_API_SECRET'),
        'redirect'      => env('TWITTER_CALLBACKURL'),
    ],

    'facebook' => [
        'client_id'     => env('459243887947491'),
        'client_secret' => env('14994a9d550e0f555877d46957007c8e'),
        'redirect'      => env('FACEBOOK_CALLBACKURL'),
    ],

    'google' => [
        'client_id'     => env('GOOGLEPLUS_API_ID'),
        'client_secret' => env('GOOGLEPLUS_API_SECRET'),
        'redirect'      => env('GOOGLEPLUS_CALLBACKURL'),
    ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

];
