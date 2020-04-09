<?php

declare(strict_types=1);

namespace App\Application\Command\SynchronizeGameResults;

final class SynchronizeGameResultsCommand
{
    /**
     * @var int
     */
    private int $id;

    /**
     * SynchronizeGameResultsCommand constructor.
     *
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
