<?php

declare(strict_types=1);

namespace App\Application\Dto;

use App\Application\Dto\GameResultDto;

interface GameResultFactoryInterface
{
    public function create(array $data): GameResultDto;
}
