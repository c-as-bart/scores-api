<?php

declare(strict_types=1);

namespace App\Application\Command\SynchronizeGameResults;

use App\Application\Service\GameResult\Dto\GameResultDto;
use App\Application\Service\GameResult\GameResultApiClientInterface;
use App\Application\Service\GameResult\GameResultRepositoryInterface;

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
     * SynchronizeGameResultsCommandHandler constructor.
     *
     * @param GameResultRepositoryInterface $gameResultRepository
     * @param GameResultApiClientInterface  $gameResultApiClient
     */
    public function __construct(
        GameResultRepositoryInterface $gameResultRepository,
        GameResultApiClientInterface $gameResultApiClient
    ) {
        $this->gameResultRepository = $gameResultRepository;
        $this->gameResultApiClient = $gameResultApiClient;
    }

    public function __invoke(SynchronizeGameResultsCommand $command)
    {
        /** @var GameResultDto[] $gameResults */
        $gameResults = $this->gameResultApiClient->getGameResult($command->getId());

        foreach ($gameResults as $item) {
            if ($this->gameResultRepository->find($item->getId()) === null) {
                $this->gameResultRepository->save($item);
            }
        }
    }
}
