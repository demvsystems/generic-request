<?php

namespace Demv\GenericRequest;

/**
 * Class ConfigurableGenericRequest
 * @package Demv\GenericRequest
 */
final class ConfigurableGenericRequest extends AbstractGenericRequest
{
    /**
     * @var string
     */
    private $target;
    /**
     * @var string
     */
    private $method;
    /**
     * @var array
     */
    private $header = [];

    /**
     * @param string $target
     */
    public function setTarget(string $target): void
    {
        $this->target = $target;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    /**
     * @param array $header
     */
    public function setHeader(array $header): void
    {
        $this->header = array_merge($this->header, $header);
    }

    /**
     * @return string
     */
    public function getTarget(): string
    {
        return $this->target;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getHeader(): array
    {
        return $this->header;
    }
}
