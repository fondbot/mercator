<?php

declare(strict_types=1);

namespace FondBot\Mercator\Contracts;

interface Image
{
    /**
     * Image url.
     *
     * @return string
     */
    public function getUrl(): string;
}