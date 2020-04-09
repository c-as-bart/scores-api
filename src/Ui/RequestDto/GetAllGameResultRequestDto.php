<?php

declare(strict_types=1);

namespace App\Ui\RequestDto;

use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/** @AccessType("public_method") */
final class GetAllGameResultRequestDto
{

    /**
     * @Type("string")
     * @SerializedName("orderBy")
     */
    private $orderBy = null;

    /**
     * @Type("string")
     * @SerializedName("orderByType")
     */
    private $orderByType = null;

    /**
     * @return string
     */
    public function getOrderBy(): ?string
    {
        return $this->orderBy;
    }

    /**
     * @param string $orderBy
     */
    public function setOrderBy(string $orderBy): void
    {
        $this->orderBy = $orderBy;
    }

    /**
     * @return string
     */
    public function getOrderByType(): ?string
    {
        return $this->orderByType;
    }

    /**
     * @param string $orderByType
     */
    public function setOrderByType(string $orderByType): void
    {
        $this->orderByType = $orderByType;
    }
}
