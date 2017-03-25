<?php

declare(strict_types=1);

namespace FondBot\Mercator\Contracts;

interface Product
{
    /**
     * Product identifier.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Product categories.
     *
     * @return Category[]
     */
    public function getCategories(): array;

    /**
     * Product images.
     *
     * @return Image[]
     */
    public function getImages(): array;

    /**
     * Product name.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Get full description of the product.
     *
     * @return string
     */
    public function getDescription(): string;

    /**
     * Get short description of the product.
     *
     * @return string
     */
    public function getShortDescription(): string;

    /**
     * Product price.
     *
     * @return float
     */
    public function getPrice(): float;

    /**
     * Product url.
     *
     * @return string
     */
    public function getUrl(): string;

    /**
     * Is product featured?
     *
     * @return bool
     */
    public function isFeatured(): bool;
}