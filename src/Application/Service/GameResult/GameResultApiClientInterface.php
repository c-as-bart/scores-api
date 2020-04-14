<?php

declare(strict_types=1);

namespace App\Application\Service\GameResult;

use App\Application\Service\GameResult\Dto\GameResultDto;

interface GameResultApiClientInterface
{
    /**
     * @param int $id
     *
     * @return GameResultDto[]
     */
    public function getGameResult(int $id): array;
}
