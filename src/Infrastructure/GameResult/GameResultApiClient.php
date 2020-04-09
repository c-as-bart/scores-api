<?php

declare(strict_types=1);

namespace App\Infrastructure\GameResult;

use App\Application\Service\GameResultApiClientInterface;
use App\Application\Dto\GameResultFactoryInterface;
use App\Infrastructure\HttpClient\HttpClientInterface;

final class GameResultApiClient implements GameResultApiClientInterface
{
    private const RESOURCE_ADDRESS = 'https://private-b5236a-jacek10.apiary-mock.com/results/games';

    /**
     * @var HttpClientInterface
     */
    private HttpClientInterface $httpClient;

    /**
     * @var GameResultFactoryInterface
     */
    private GameResultFactoryInterface $gameResultFactory;

    /**
     * GameResultApiClient constructor.
     *
     * @param HttpClientInterface $httpClient
     */
    public function __construct(
        HttpClientInterface $httpClient,
        GameResultFactoryInterface $gameResultFactory
    ) {
        $this->httpClient = $httpClient;
        $this->gameResultFactory = $gameResultFactory;
    }

    /**
     * @inheritDoc
     */
    public function getGameResult(int $id): array
    {
        $result = [];
        $httpClientResult = $this->httpClient->get(self::RESOURCE_ADDRESS . '/' . (string) $id);

        foreach ($httpClientResult as $gameResult) {
            $result[] = $this->gameResultFactory->create($gameResult);
        }

        return $result;
    }
}
