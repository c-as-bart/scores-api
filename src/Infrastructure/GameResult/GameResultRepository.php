<?php

declare(strict_types=1);

namespace App\Infrastructure\GameResult;

use App\Application\Dto\GameResultDto;
use App\Application\Service\GameResultRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use JMS\Serializer\SerializerInterface;

final class GameResultRepository implements GameResultRepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * @var SerializerInterface
     */
    private SerializerInterface $serializer;

    /**
     * GameResultRepository constructor.
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        SerializerInterface $serializer
    ) {
        $this->entityManager = $entityManager;
        $this->serializer = $serializer;
    }

    public function save(GameResultDto $gameResult): void
    {
        $json = $this->serializer->serialize($gameResult, 'json');
        $connection = $this->entityManager->getConnection();
        $connection->insert(
            DatabaseConst::TABLE,
            [
                DatabaseConst::ID => $gameResult->getId(),
                DatabaseConst::OBJECT => $json,
            ]
        );
    }
}
