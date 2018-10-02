<?php

namespace Demv\GenericRequest;

/**
 * Trait GetGenericRequestTrait
 * @package Demv\GenericRequest
 */
trait GetGenericRequestTrait
{
    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GET';
    }
}
