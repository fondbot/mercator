<?php

declare(strict_types=1);

namespace FondBot\Mercator\Contracts;

interface Driver
{
    /**
     * Get categories.
     *
     * @param int $page
     * @param int $perPage
     * @return Category[]
     */
    public function getCategories(int $page, int $perPage = 10): array;

    /**
     * Get products.
     *
     * @param int $page
     * @param int $perPage
     * @return Product[]
     */
    public function getProducts(int $page, int $perPage = 10): array;
}