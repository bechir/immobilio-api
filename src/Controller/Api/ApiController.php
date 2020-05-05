<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Controller\Api;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends AbstractController
{
    protected $jmsSerializer;

    public function __construct(SerializerInterface $jmsSerializer)
    {
        $this->jmsSerializer = $jmsSerializer;
    }

    /**
     * Returns a JSON response.
     *
     * @param array $data
     * @param array $headers
     *
     * @return Symfony\Component\HttpFoundation\JsonResponse
     */
    public function respond($data)
    {
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Returns a JSON response.
     *
     * @param array $data
     * @param array $headers
     *
     * @return Symfony\Component\HttpFoundation\JsonResponse
     */
    public function jsonResponse($data, string $format = 'json', ?SerializationContext $context = null, ?string $type = null)
    {
        $serialized = $this->jmsSerializer->serialize($data, $format, $context, $type);

        $response = new Response($serialized);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
