<?php

declare(strict_types=1);

namespace FondBot\Mercator\Contracts;

interface Category
{
    /**
     * Category identifier.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Category name.
     *
     * @return string
     */
    public function getName(): string;
}