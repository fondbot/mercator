<?php

declare(strict_types=1);

namespace FondBot\Mercator\Drivers\WooCommerce;

use FondBot\Mercator\Contracts\Category;

class WooCommerceCategory implements Category
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Category identifier.
     *
     * @return string
     */
    public function getId(): string
    {
        return (string)$this->data['id'];
    }

    /**
     * Category name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->data['name'];
    }
}