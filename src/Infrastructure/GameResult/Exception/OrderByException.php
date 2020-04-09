<?php

declare(strict_types=1);

namespace App\Infrastructure\GameResult\Exception;

use Exception;

final class OrderByException extends Exception
{

    /**
     * OrderByException constructor.
     *
     * @param string $orderBy
     */
    public function __construct(string $orderBy)
    {
        parent::__construct(
            sprintf(
                'Order by: %s not support',
                $orderBy
            )
        );
    }
}
