<?php

declare(strict_types=1);

namespace App\Infrastructure\GameResult;

use App\Application\Service\GameResult\Dto\GameResultDto;
use App\Application\Service\GameResult\Dto\UserDto;
use App\Application\Service\GameResult\GameResultFactoryInterface;
use DateTime;

class GameResultFactory implements GameResultFactoryInterface
{

    public function create(array $data): GameResultDto
    {
        $user = new UserDto(
            $data[GameResultApiConst::USER][GameResultApiConst::NAME],
            $data[GameResultApiConst::USER][GameResultApiConst::ID]
        );

        return new GameResultDto(
            $data[GameResultApiConst::ID],
            $user,
            $data[GameResultApiConst::SCORE],
            DateTime::createFromFormat('Y-m-d\TH:i:sP',
                $data[GameResultApiConst::FINISHED_AT])
        );
    }
}
