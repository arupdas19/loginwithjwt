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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => 'http://your-callback-url',
    ],
    'facebook' => [
        'client_id' => '299584567843169',
        'client_secret' => '1ab4a778a01a42b2587366cbd81ae24b',
        'redirect' => 'http://localhost/demoProject/public/login/facebook/callback',
    ],
    'google' => [
        'client_id' => '272626169599-bgcal3ht5dns7dmudh2b6h3kmg867i4f.apps.googleusercontent.com',
        'client_secret' => 'DAb90YZVA8cV428GoBAmYNb7',
        'redirect' => 'http://localhost/demoProject/public/login/google/callback',
      ],

    ];
