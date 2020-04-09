<?php

declare(strict_types=1);

namespace App\Infrastructure\GameResult;

use App\Application\Service\GameResultServiceInterface;
use Doctrine\ORM\EntityManagerInterface;

class GameResultService implements GameResultServiceInterface
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * GameResultService constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @inheritDoc
     */
    public function isExist(string $id): bool
    {
        $queryBuilder = $this->entityManager->getConnection()->createQueryBuilder();
        $queryBuilder
            ->select('*')
            ->from(DatabaseConst::TABLE)
            ->where(sprintf('%s = :id', DatabaseConst::ID))
            ->setParameter('id', $id);

        $result = $queryBuilder->execute()->fetch();

        if (empty($result)) {
            return false;
        }

        return true;
    }
}
