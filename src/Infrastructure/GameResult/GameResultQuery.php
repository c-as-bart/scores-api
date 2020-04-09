<?php

declare(strict_types=1);

namespace App\Infrastructure\GameResult;

use App\Application\Dto\GameResultDto;
use App\Application\Dto\GameResultFactoryInterface;
use App\Application\Query\GameResultQueryInterface;
use App\Infrastructure\GameResult\Exception\OrderByException;
use Doctrine\ORM\EntityManagerInterface;

final class GameResultQuery implements GameResultQueryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * @var GameResultFactoryInterface
     */
    private GameResultFactoryInterface $gameResultFactory;

    /**
     * GameResultQuery constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        GameResultFactoryInterface $gameResultFactory
    ) {
        $this->entityManager = $entityManager;
        $this->gameResultFactory = $gameResultFactory;
    }

    /**
     * @inheritDoc
     */
    public function getAll(
        ?string $orderBy,
        ?string $orderByType
    ): array {
        if ($orderBy === null) {
            $orderBy = 'finished_at';
        }

        if ($orderByType === null) {
            $orderByType = 'asc';
        }

        $queryBuilder = $this->entityManager->getConnection()->createQueryBuilder();
        $queryBuilder
            ->select('*')
            ->from('game_result')
            ->orderBy(
                $this->mapOrderBy($orderBy),
                $orderByType
            );

        $queryResult = $queryBuilder->execute()->fetchAll();
        $result = [];

        foreach ($queryResult as $item) {
            $result[] = $this->gameResultFactory->create(
                json_decode($item[DatabaseConst::OBJECT], true)
            );
        }

        return $result;
    }

    private function mapOrderBy(string $orderBy): string
    {
        switch ($orderBy) {
            case 'score':
               return "cast (object ->> 'score' as int)";
            case 'finishedAt':
                return "cast (object ->> 'finished_at' as timestamp)";
            default:
                throw new OrderByException($orderBy);
        }
    }
}
