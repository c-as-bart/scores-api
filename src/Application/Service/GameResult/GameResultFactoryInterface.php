<?php

declare(strict_types=1);

namespace App\Application\Service\GameResult;

use App\Application\Service\GameResult\Dto\GameResultDto;

interface GameResultFactoryInterface
{
    public function create(array $data): GameResultDto;
}
