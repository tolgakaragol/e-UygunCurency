<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Currency\Provider\AllProviders;

class AllProvidersTest extends TestCase
{
    private $allProviders;
    private $expectedResults;

    public function setup()
    {
        $this->allProviders = new AllProviders();
        $this->expectedResults = [
            'usd'       => [
                0 => [
                    'apiUrl' => 'http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0',
                    'rate'  => (float) 4.15234
                ],
                1 => [
                    'apiUrl' => 'http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3',
                    'rate'  => (float) 4.14234
                ]
            ],
            'eur'       => [
                0 => [
                    'apiUrl' => 'http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0',
                    'rate'  => (float) 4.67234
                ],
                1 => [
                    'apiUrl' => 'http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3',
                    'rate'  => (float) 4.68234
                ]
            ],
            'gbp'       => [
                0 => [
                    'apiUrl' => 'http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0',
                    'rate'  => (float) 5.00234
                ],
                1 => [
                    'apiUrl' => 'http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3',
                    'rate'  => (float) 5.01234
                ]
            ]
        ];
    }

    public function testGetAllRates()
    {
        $this->setup();
        $this->assertSame($this->expectedResults, $this->allProviders->getAllRates());
    }
}
