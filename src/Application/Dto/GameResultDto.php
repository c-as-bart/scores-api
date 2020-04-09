<?php

declare(strict_types=1);

namespace App\Application\Dto;

use DateTime;

final class GameResultDto
{
    /**
     * @var string
     */
    private string $id;

    /**
     * @var UserDto
     */
    private UserDto $user;

    /**
     * @var int
     */
    private int $score;

    /**
     * @var DateTime
     */
    private DateTime $finishedAt;

    /**
     * GameResultDto constructor.
     *
     * @param string   $id
     * @param UserDto  $user
     * @param int      $score
     * @param DateTime $finishedAt
     */
    public function __construct(
        string $id,
        UserDto $user,
        int $score,
        DateTime $finishedAt
    ) {
        $this->id = $id;
        $this->user = $user;
        $this->score = $score;
        $this->finishedAt = $finishedAt;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return UserDto
     */
    public function getUser(): UserDto
    {
        return $this->user;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @return DateTime
     */
    public function getFinishedAt(): DateTime
    {
        return $this->finishedAt;
    }
}
