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
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'github' => [
        'client_id' => '55b22053f6a99e78c14c',         // Your GitHub Client ID
        'client_secret' =>'b04c664105ba4671d9c9cf9b1c4bd47d4f1942a0', // Your GitHub Client Secret
        'redirect' => 'http://localhost:8000/auth/github/callback',
    ],
    'twitter' => [
        'client_id' => 'h74fV6J17ti5Var8BlLATxL42',         // Your GitHub Client ID
        'client_secret' =>'4RECZf5zcsYhymuJaSOBdxQFbYkzJkQs6zk8zTfeKcX7HViFLc', // Your GitHub Client Secret
        'redirect' => 'http://localhost:8000/auth/twitter/callback',
    ],
    'google' => [
        'client_id' => '599726757093-n5prf7jrrtf248vafj9ihmna7ddrgun1.apps.googleusercontent.com',         // Your GitHub Client ID
        'client_secret' => 'd4766WsCns-5twyGJQPJj1OT', // Your GitHub Client Secret
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

];
