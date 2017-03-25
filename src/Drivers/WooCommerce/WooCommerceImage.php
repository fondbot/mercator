<?php

declare(strict_types=1);

namespace FondBot\Mercator\Drivers\WooCommerce;

use FondBot\Mercator\Contracts\Image;

class WooCommerceImage implements Image
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Image url.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->data['src'];
    }
}