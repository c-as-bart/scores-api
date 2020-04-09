<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Application\Dto\GameResultDto;

interface GameResultRepositoryInterface
{
    public function save(GameResultDto $gameResult): void;
}
