<?php

namespace Demv\GenericRequest;

/**
 * Trait JsonGenericRequestTrait
 * @package Demv\GenericRequest
 */
trait JsonGenericRequestTrait
{
    /**
     * @return array
     */
    public function getHeader(): array
    {
        return ['Content-Type' => 'application/json;charset=UTF-8'];
    }
}
