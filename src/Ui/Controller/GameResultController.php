<?php

declare(strict_types=1);

namespace App\Ui\Controller;

use App\Application\Query\GameResultQueryInterface;
use App\Ui\RequestDto\GetAllGameResultRequestDto;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class GameResultController extends AbstractController
{
    /**
     * @Route("/game-result", methods={"GET"})
     */
    public function getAll(
        Request $request,
        GameResultQueryInterface $gameResultQuery,
        SerializerInterface $serializer
    ): Response {
        /** @var GetAllGameResultRequestDto $requestDto */
        $requestDto = $this->mapQueryString($request,
            GetAllGameResultRequestDto::class);
        $result = $gameResultQuery->getAll(
            $requestDto->getOrderBy(),
            $requestDto->getOrderByType()
        );

        return new Response(
            $serializer->serialize($result, 'json'),
            Response::HTTP_OK
        );
    }
}
