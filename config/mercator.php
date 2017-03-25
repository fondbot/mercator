<?php

return [

    'default' => 'woocommerce',

    'connections' => [

        'woocommerce' => [
            'driver' => 'woocommerce',
            'host' => env('WOOCOMMERCE_HOST'),
            'key' => env('WOOCOMMERCE_KEY'),
            'secret' => env('WOOCOMMERCE_SECRET'),
            'version' => env('WOOCOMMERCE_VERSION', 'wc/v1'),
        ],

    ],

];