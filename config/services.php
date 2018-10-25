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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
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
    ],
    'facebook' => [
        'client_id' => '270501483606289',
        'client_secret' => '02cfa5e16e6e5da8b11e65e72ee56f82',
        'redirect' => 'http://localhost:8000/login/facebook/callback',

    ],
    'linkedin' => [
        'client_id' => '86f3k2fz2bi8sd',
        'client_secret' => '9x1AzkJmlClTCMfe',
        'redirect' => 'http://localhost:8000/login/linkedin/callback',

    ],
    'github' => [
        'client_id' => '83aefb5c54f5ef8fdeeb',
        'client_secret' => '8b7e796323aca16313f7eb6acf673f5f8bb59bd1',
        'redirect' => 'http://localhost:8000/login/github/callback',

    ],
    'google' => [
        'client_id' => '470271630880-ibvjc8oguei720dvl80mcv1d8dam4g4i.apps.googleusercontent.com',
        'client_secret' => 'mIuJW25erIumD_M85s0xbPJl',
        'redirect' => 'http://localhost:8000/login/google/callback',

    ],

];
