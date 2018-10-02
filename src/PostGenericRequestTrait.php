<?php

namespace Demv\GenericRequest;

/**
 * Trait PostGenericRequestTrait
 * @package Demv\GenericRequest
 */
trait PostGenericRequestTrait
{
    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'POST';
    }
}
