<?php

declare(strict_types=1);

namespace FondBot\Mercator\Drivers\WooCommerce;

use Automattic\WooCommerce\Client;
use FondBot\Mercator\Contracts\Driver;
use FondBot\Mercator\Contracts\Product;

class WooCommerceDriver implements Driver
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get categories.
     *
     * @param int $page
     * @param int $perPage
     * @return WooCommerceCategory[]
     */
    public function getCategories(int $page, int $perPage = 10): array
    {
        $response = $this->client->get('products/categories', [
            'page' => $page,
            'per_page' => $perPage,
        ]);

        return collect($response)
            ->transform(function ($item) {
                return new WooCommerceCategory($item);
            })
            ->toArray();
    }

    /**
     * Get products.
     *
     * @param int $page
     * @param int $perPage
     * @return Product[]
     */
    public function getProducts(int $page, int $perPage = 10): array
    {
        $response = $this->client->get('products', [
            'page' => $page,
            'per_page' => $perPage,
        ]);

        return collect($response)
            ->transform(function ($item) {
                return new WooCommerceProduct($item);
            })
            ->toArray();
    }
}