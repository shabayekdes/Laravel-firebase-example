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

    'facebook' => [ //change it to any provider
        'client_id' => '456993814795119',
        'client_secret' => 'e19f51587e3fd26376b7538d801874be',
        'redirect' => 'http://34.221.235.215/auth/facebook/callback',
    ],
    'twitter' => [ //change it to any provider
        'client_id' => '9e0eT1Nl7RSi3MRnccxD7oKUH',
        'client_secret' => 'mJLyxM6GyOcu9aFhaXnxHggmrAtxeaJRGaDHM3O9JMJ8iO6S9Y',
        'redirect' => 'http://34.221.235.215/auth/twitter/callback',
    ],
    'google' => [ //change it to any provider
        'client_id' => '658379441443-7bc8fpu5psonjivm3i8lekedkv9r2fpk.apps.googleusercontent.com',
        'client_secret' => 'gNEaWVqgS6OFIFwmyzqSu4Xj',
        'redirect' => 'http://34.221.235.215/auth/google/callback',
    ],

];
