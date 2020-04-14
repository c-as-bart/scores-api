<?php

declare(strict_types=1);

namespace App\Infrastructure\GameResult;

use App\Application\Query\GameResultQueryInterface;
use App\Application\Service\GameResult\Dto\GameResultDto;
use Doctrine\ODM\MongoDB\DocumentManager;

final class GameResultQuery implements GameResultQueryInterface
{
    /**
     * @var DocumentManager
     */
    private DocumentManager $documentManager;

    /**
     * GameResultQuery constructor.
     *
     * @param DocumentManager $documentManager
     */
    public function __construct(
        DocumentManager $documentManager
    ) {
        $this->documentManager = $documentManager;
    }

    /**
     * @inheritDoc
     */
    public function getAll(
        ?string $orderBy,
        ?string $orderByType
    ): array {
        $orderBy = isset($orderBy) ? $orderBy : 'scores';
        $orderByType = isset($orderByType) ? $orderByType : 'DESC';

        $result = $this->documentManager->createQueryBuilder(GameResultDto::class)
            ->sort($orderBy, $orderByType)
            ->getQuery()
            ->execute();

        return $result->toArray();
    }
}
