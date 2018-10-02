<?php

namespace Demv\GenericRequest;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Interface GenericRequestInterface
 * @package Demv\GenericRequest
 */
interface GenericRequestInterface
{
    /**
     * @param ClientInterface $client
     */
    public function setClient(ClientInterface $client): void;

    /**
     * @return ClientInterface
     */
    public function getClient(): ClientInterface;

    /**
     * @param RequestInterface $request
     */
    public function setRequest(RequestInterface $request): void;

    /**
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface;

    /**
     * @return ResponseInterface
     */
    public function send(): ResponseInterface;

    /**
     * @return string
     */
    public function getTarget(): string;

    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @return array
     */
    public function getHeader(): array;

    /**
     * @param $body
     */
    public function setBody($body): void;
}

