<?php

namespace Demv\GenericRequest;

/**
 * Trait PutGenericRequestTrait
 * @package Demv\GenericRequest
 */
trait PutGenericRequestTrait
{
    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'PUT';
    }
}
