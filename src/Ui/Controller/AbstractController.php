<?php

declare(strict_types=1);

namespace App\Ui\Controller;

use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractController
{
    /**
     * @var SerializerInterface
     */
    private SerializerInterface $serializer;

    /**
     * AbstractController constructor.
     *
     * @param SerializerInterface $serializer
     */
    public function __construct(
        SerializerInterface $serializer
    ) {
        $this->serializer = $serializer;
    }

    protected function mapQueryString(
        Request $request,
        string $requestDtoClassName
    ): object {
        $params = json_encode($request->query->all());

        return $this->serializer->deserialize($params, $requestDtoClassName,
            'json');
    }
}
