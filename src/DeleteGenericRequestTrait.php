<?php

namespace Demv\GenericRequest;

/**
 * Trait DeleteGenericRequestTrait
 * @package Demv\GenericRequest
 */
trait DeleteGenericRequestTrait
{
    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'DELETE';
    }
}
