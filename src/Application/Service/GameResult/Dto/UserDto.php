<?php

declare(strict_types=1);

namespace App\Application\Service\GameResult\Dto;

class UserDto
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $id;

    /**
     * UserDto constructor.
     *
     * @param string $name
     * @param string $id
     */
    public function __construct(
        string $name,
        string $id
    ) {
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}
