<?php

declare(strict_types=1);

namespace App\Controller\User;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Register
{
    public function __invoke(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        return new JsonResponse(
            [
                'user' => [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'createdOn' => (new \DateTime())->format(\DateTime::RFC3339),
                ],
            ],
            Response::HTTP_CREATED
        );
    }
}