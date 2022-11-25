<?php

declare(strict_types=1);

namespace Demv\GenericRequest\Tests;

use Demv\GenericRequest\GenericRequestBuilder;
use Demv\GenericRequest\GenericRequestInterface;
use PHPUnit\Framework\TestCase;

final class GenericRequestBuilderTest extends TestCase
{
    /**
     * @param string $method
     * @param string $expected
     *
     * @dataProvider provideTestStaticMethods
     */
    public function testStaticMethods(string $method, string $expected): void
    {
        /** @var GenericRequestInterface $request */
        $request = GenericRequestBuilder::new()->$method()->withTarget('target')->build();
        self::assertEquals($expected, $request->getMethod());
    }

    public function provideTestStaticMethods(): array
    {
        return [
            'post'   => ['post', 'POST'],
            'get'    => ['get', 'GET'],
            'delete' => ['delete', 'DELETE'],
            'put'    => ['put', 'PUT'],
        ];
    }

}
