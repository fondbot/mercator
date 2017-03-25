<?php

declare(strict_types=1);

namespace FondBot\Mercator\Drivers\WooCommerce;

use FondBot\Mercator\Contracts\Product;

class WooCommerceProduct implements Product
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Product identifier.
     *
     * @return string
     */
    public function getId(): string
    {
        return (string)$this->data['id'];
    }

    /**
     * Product categories.
     *
     * @return WooCommerceCategory[]
     */
    public function getCategories(): array
    {
        return collect($this->data['categories'])
            ->transform(function ($item) {
                return new WooCommerceCategory($item);
            })
            ->toArray();
    }

    /**
     * Product images.
     *
     * @return WooCommerceImage[]
     */
    public function getImages(): array
    {
        return collect($this->data['images'])
            ->transform(function ($item) {
                return new WooCommerceImage($item);
            })
            ->toArray();
    }

    /**
     * Product name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->data['name'];
    }

    /**
     * Get full description of the product.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->data['description'];
    }

    /**
     * Get short description of the product.
     *
     * @return string
     */
    public function getShortDescription(): string
    {
        return $this->data['short_description'];
    }

    /**
     * Product price.
     *
     * @return float
     */
    public function getPrice(): float
    {
        return (float)$this->data['price'];
    }

    /**
     * Product url.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->data['permalink'];
    }

    /**
     * Is product featured?
     *
     * @return bool
     */
    public function isFeatured(): bool
    {
        return $this->data['featured'];
    }
}