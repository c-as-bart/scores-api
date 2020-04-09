<?php

declare(strict_types=1);

namespace App\Infrastructure\HttpClient;

interface HttpClientInterface
{
    /**
     * @param string $uri
     *
     * @return array
     */
    public function get(string $uri): array;
}
