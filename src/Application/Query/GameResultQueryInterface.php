<?php

declare(strict_types=1);

namespace App\Application\Query;

use App\Application\Service\GameResult\Dto\GameResultDto;

interface GameResultQueryInterface
{
    /**
     * @param string|null $orderBy
     * @param string|null $orderByType
     *
     * @return GameResultDto[]
     */
    public function getAll(
        ?string $orderBy,
        ?string $orderByType
    ): array;
}
