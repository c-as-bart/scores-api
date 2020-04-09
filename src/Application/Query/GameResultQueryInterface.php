<?php

declare(strict_types=1);

namespace App\Application\Query;

interface GameResultQueryInterface
{


    /**
     * @param string|null $orderBy
     * @param string|null $orderByType
     *
     * @return array
     */
    public function getAll(
        ?string $orderBy,
        ?string $orderByType
    ): array;
}
