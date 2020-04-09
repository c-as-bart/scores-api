<?php

declare(strict_types=1);

namespace App\Application\Service;

interface GameResultServiceInterface
{
    /**
     * @param string $id
     *
     * @return bool
     */
    public function isExist(string $id): bool;
}
