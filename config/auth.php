<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',      // Admin is default
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Define every authentication guard for your application.
    | The default 'web' uses session driver and users provider.
    | We add 'volunteer' and 'organization' guards below.
    |
    */

    'guards' => [
        'web' => [    // Admin guard
            'driver' => 'session',
            'provider' => 'users',
        ],

        'volunteer' => [
            'driver' => 'session',
            'provider' => 'volunteers',
        ],

        'organization' => [
            'driver' => 'session',
            'provider' => 'organizations',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Define how users are retrieved from database or storage.
    | Add providers for volunteers and organizations alongside users.
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'volunteers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Volunteer::class,
        ],

        'organizations' => [
            'driver' => 'eloquent',
            'model' => App\Models\Organization::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Password reset configurations for each user type.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        'volunteers' => [
            'provider' => 'volunteers',
            'table' => 'volunteer_password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        'organizations' => [
            'provider' => 'organizations',
            'table' => 'organization_password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    */

    'password_timeout' => 10800,

];
