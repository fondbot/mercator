<?php

declare(strict_types=1);

namespace FondBot\Mercator\Drivers\WooCommerce;

use Automattic\WooCommerce\Client;
use Illuminate\Support\ServiceProvider;

class WooCommerceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('mercator.woocommerce', WooCommerceDriver::class);

        $this->app->bind(WooCommerceDriver::class, function () {
            $config = $this->app['mercator.woocommerce.config'];

            $client = new Client($config['host'], $config['key'], $config['secret'], [
                'wp_api' => true,
                'version' => $config['version'],
            ]);

            return new WooCommerceDriver($client);
        });
    }
}