<?php

declare(strict_types=1);

namespace FondBot\Mercator;

use FondBot\Mercator\Contracts\Driver;
use FondBot\Mercator\Drivers\WooCommerce\WooCommerceServiceProvider;
use FondBot\Providers\ServiceProvider as FondBotServiceProvider;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->app->register(FondBotServiceProvider::class);
        $this->app->register(WooCommerceServiceProvider::class);

        $this->console();

        $this->createDrivers();
    }

    private function createDrivers(): void
    {
        $config = config('mercator');

        if ($config === null) {
            return;
        }

        // Bind default driver
        $default = $config['default'];
        $connection = $config['connections'][$default];

        $this->app->bind(Driver::class, 'mercator.' . $connection['driver']);
        $this->app->bind('mercator.' . $connection['driver'] . '.config', function () use ($connection) {
            return $connection;
        });
    }

    private function console(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/mercator.php' => config_path('mercator.php'),
            ]);
        }
    }
}