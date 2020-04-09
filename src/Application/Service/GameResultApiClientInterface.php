<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Application\Dto\GameResultDto;

interface GameResultApiClientInterface
{
    /**
     * @param int $id
     *
     * @return GameResultDto[]
     */
    public function getGameResult(int $id): array;
}
