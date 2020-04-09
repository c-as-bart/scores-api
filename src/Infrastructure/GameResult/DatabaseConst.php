<?php

declare(strict_types=1);

namespace App\Infrastructure\GameResult;

final class DatabaseConst
{
    public const TABLE = 'game_result';

    public const ID = 'id';
    public const OBJECT = 'object';
    public const OBJECT_SCORE = 'score';
    public const OBJECT_FINISHED_AT = 'finished_at';
}
