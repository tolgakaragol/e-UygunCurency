<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Currency\Strategy\AllComprator;

class AllCompratorTest extends TestCase
{
    private $allComprator;
    private $expectedSortedResults;
    private $expectedCheapestResults;

    public function setup()
    {
        $this->allComprator = new AllComprator();
        $this->allComprator->findMinAndSort();

        $this->expectedSortedResults = [
            'usd'       => [
                0 => [
                    'apiUrl' => 'http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3',
                    'rate'  => (float) 4.14234
                ],
                1 => [
                    'apiUrl' => 'http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0',
                    'rate'  => (float) 4.15234
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

        $this->expectedCheapestResults = [
            'usd'       =>  [
                'apiUrl' => 'http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3',
                'rate'  => (float) 4.14234
            ],
            'eur'       => [
                'apiUrl' => 'http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0',
                'rate'  => (float) 4.67234
            ],
            'gbp'       => [
                'apiUrl' => 'http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0',
                'rate'  => (float) 5.00234
            ]
        ];
    }

    public function testGetSortedRates()
    {
        $this->assertSame($this->expectedSortedResults, $this->allComprator->getSortedRates());
    }

    public function testGetCheapestRate()
    {
        $this->assertSame($this->expectedCheapestResults, $this->allComprator->getCheapestRate());
    }
}
