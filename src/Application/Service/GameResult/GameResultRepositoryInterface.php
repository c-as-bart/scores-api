<?php

declare(strict_types=1);

namespace App\Application\Service\GameResult;

use App\Application\Service\GameResult\Dto\GameResultDto;

interface GameResultRepositoryInterface
{
    /**
     * @param GameResultDto $gameResult
     */
    public function save(GameResultDto $gameResult): void;

    /**
     * @param string $id
     *
     * @return GameResultDto|null
     */
    public function find(string $id): ?GameResultDto;
}
