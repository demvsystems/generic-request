<?php

namespace Demv\GenericRequest;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AbstractGenericRequest
 * @package Demv\GenericRequest
 */
abstract class AbstractGenericRequest implements GenericRequestInterface
{
    /**
     * @var ClientInterface
     */
    private $client;
    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @param ClientInterface $client
     */
    public function setClient(ClientInterface $client): void
    {
        $this->client = $client;
    }

    /**
     * @return ClientInterface
     */
    public function getClient(): ClientInterface
    {
        if ($this->client === null) {
            $this->setClient(new Client());
        }

        return $this->client;
    }

    /**
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send(): ResponseInterface
    {
        $request = $this->getRequest();
        try {
            $response = $this->getClient()->send($request);
        } catch (RequestException $exception) {
            if (!$exception->hasResponse()) {
                throw $exception;
            }

            $response = $exception->getResponse();
        }

        return $response;
    }

    /**
     * @param $body
     */
    public function setBody($body): void
    {
        $request = new Request(
            $this->getMethod(),
            $this->getTarget(),
            $this->getHeader(),
            $body
        );

        $this->setRequest($request);
    }

    /**
     * @param RequestInterface $request
     */
    public function setRequest(RequestInterface $request): void
    {
        $this->request = $request;
    }

    /**
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface
    {
        if ($this->request === null) {
            $this->setBody(null);
        }

        return $this->request;
    }
}
