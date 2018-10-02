<?php

namespace Demv\GenericRequest;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Class GenericRequestBuilder
 * @package Demv\GenericRequest
 */
final class GenericRequestBuilder
{
    /**
     * @var string
     */
    private $target;
    /**
     * @var string
     */
    private $body;
    /**
     * @var RequestInterface
     */
    private $request;
    /**
     * @var string
     */
    private $method;
    /**
     * @var ClientInterface
     */
    private $client;
    /**
     * @var array
     */
    private $header = [];

    /**
     * @return GenericRequestBuilder
     */
    public static function new(): self
    {
        return new self();
    }

    /**
     * @return GenericRequestBuilder
     */
    public function json(): self
    {
        return $this->withHeader(['Content-Type' => 'application/json;charset=UTF-8']);
    }

    /**
     * @return GenericRequestBuilder
     */
    public function post(): self
    {
        return $this->withMethod('POST');
    }

    /**
     * @return GenericRequestBuilder
     */
    public function get(): self
    {
        return $this->withMethod('GET');
    }

    /**
     * @return GenericRequestBuilder
     */
    public function put(): self
    {
        return $this->withMethod('PUT');
    }

    /**
     * @return GenericRequestBuilder
     */
    public function delete(): self
    {
        return $this->withMethod('DELETE');
    }

    /**
     * @param ClientInterface $client
     *
     * @return GenericRequestBuilder
     */
    public function withClient(ClientInterface $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @param RequestInterface $request
     *
     * @return GenericRequestBuilder
     */
    public function withRequest(RequestInterface $request): self
    {
        $this->request = $request;

        return $this;
    }

    /**
     * @param $body
     *
     * @return GenericRequestBuilder
     */
    public function withBody($body): self
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @param string $target
     *
     * @return GenericRequestBuilder
     */
    public function withTarget(string $target): self
    {
        $this->target = $target;

        return $this;
    }

    /**
     * @param string $method
     *
     * @return GenericRequestBuilder
     */
    public function withMethod(string $method): self
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @param array $header
     *
     * @return GenericRequestBuilder
     */
    public function withHeader(array $header): self
    {
        $this->header = array_merge($this->header, $header);

        return $this;
    }

    /**
     * @return GenericRequestInterface
     */
    public function build(): GenericRequestInterface
    {
        $request = new ConfigurableGenericRequest();
        $request->setHeader($this->header);
        $request->setTarget($this->target);
        $request->setMethod($this->method);

        if ($this->client !== null) {
            $request->setClient($this->client);
        }

        if ($this->request !== null) {
            $request->setRequest($this->request);
        } else if ($this->body !== null) {
            $request->setBody($this->body);
        }

        return $request;
    }
}
