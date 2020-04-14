<?php

declare(strict_types=1);

namespace App\Infrastructure\GameResult;

use App\Application\Service\GameResult\Dto\GameResultDto;
use App\Application\Service\GameResult\GameResultRepositoryInterface;
use Doctrine\ODM\MongoDB\DocumentManager;

final class GameResultRepository implements GameResultRepositoryInterface
{
    /**
     * @var DocumentManager
     */
    private DocumentManager $documentManager;

    /**
     * GameResultRepository constructor.
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
    public function save(GameResultDto $gameResult): void
    {
        $this->documentManager->persist($gameResult);
        $this->documentManager->flush();
    }

    /**
     * @inheritDoc
     */
    public function find(string $id): ?GameResultDto
    {
        $documentRepository = $this->documentManager->getRepository(GameResultDto::class);

        return $documentRepository->find($id);
    }
}
