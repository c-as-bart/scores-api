<?php

declare(strict_types=1);

namespace App\Infrastructure\HttpClient;

use App\Infrastructure\VscService\Exception\ResourceNotExistException;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Contracts\HttpClient\HttpClientInterface as SymphonyHttpClientInterface;

final class HttpClient implements HttpClientInterface
{
    /**
     * @var SymphonyHttpClientInterface
     */
    private SymphonyHttpClientInterface $httpClient;

    /**
     * HttpClient constructor.
     *
     * @param SymphonyHttpClientInterface $httpClient
     */
    public function __construct(SymphonyHttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @inheritDoc
     */
    public function get(string $uri): array
    {
        try {
            return $this->httpClient->request('GET', $uri)->toArray();
        } catch (Exception $exception) {
            throw new ResourceNotExistException();
        }
    }
}
