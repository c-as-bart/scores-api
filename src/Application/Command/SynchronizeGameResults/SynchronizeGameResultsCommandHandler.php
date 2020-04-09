<?php

declare(strict_types=1);

namespace App\Application\Command\SynchronizeGameResults;

use App\Application\Dto\GameResultDto;
use App\Application\Service\GameResultApiClientInterface;
use App\Application\Service\GameResultRepositoryInterface;
use App\Application\Service\GameResultServiceInterface;

final class SynchronizeGameResultsCommandHandler
{
    /**
     * @var GameResultRepositoryInterface
     */
    private GameResultRepositoryInterface $gameResultRepository;

    /**
     * @var GameResultApiClientInterface
     */
    private GameResultApiClientInterface $gameResultApiClient;

    /**
     * @var GameResultServiceInterface
     */
    private GameResultServiceInterface $gameResultService;

    /**
     * SynchronizeGameResultsCommandHandler constructor.
     *
     * @param GameResultRepositoryInterface $gameResultRepository
     * @param GameResultApiClientInterface  $gameResultApiClient
     * @param GameResultServiceInterface    $gameResultService
     */
    public function __construct(
        GameResultRepositoryInterface $gameResultRepository,
        GameResultApiClientInterface $gameResultApiClient,
        GameResultServiceInterface $gameResultService
    ) {
        $this->gameResultRepository = $gameResultRepository;
        $this->gameResultApiClient = $gameResultApiClient;
        $this->gameResultService = $gameResultService;
    }

    public function __invoke(SynchronizeGameResultsCommand $command)
    {
        /** @var GameResultDto[] $gameResults */
        $gameResults = $this->gameResultApiClient->getGameResult($command->getId());

        foreach ($gameResults as $item) {
            if (!$this->gameResultService->isExist($item->getId())) {
                $this->gameResultRepository->save($item);
            }
        }
    }
}
