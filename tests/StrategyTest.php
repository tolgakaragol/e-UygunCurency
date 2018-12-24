<?php

namespace App\Tests;


use PHPUnit\Framework\TestCase;
use App\Currency\Strategy\Strategy;
use App\Currency\Strategy\EurComprator;
use App\Currency\Strategy\UsdComprator;
use App\Currency\Strategy\GbpComprator;

class StrategyTest extends TestCase
{
    private $expectedSortedEur;
    private $expectedSortedUsd;
    private $expectedCheapestUsd;
    private $expectedCheapestGbp;

    public function setup()
    {
        $this->expectedSortedEur = [
            0 => [
                'apiUrl' => 'http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0',
                'rate'  => (float) 4.67234
            ],
            1 => [
                'apiUrl' => 'http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3',
                'rate'  => (float) 4.68234
            ]
        ];

        $this->expectedSortedUsd = [
            0 => [
                'apiUrl' => 'http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3',
                'rate'  => (float) 4.14234
            ],
            1 => [
                'apiUrl' => 'http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0',
                'rate'  => (float) 4.15234
            ]

        ];

        $this->expectedCheapestUsd = [
            'apiUrl' => 'http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3',
            'rate'  => (float) 4.14234
        ];

        $this->expectedCheapestGbp = [
            'apiUrl' => 'http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0',
            'rate'  => (float) 5.00234
        ];
    }

    public function testGetSortedEur()
    {
        $strategy = new Strategy(new EurComprator());
        $this->assertSame($this->expectedSortedEur, $strategy->getSortedRates());

    }

    public function testGetSortedUsd()
    {
        $strategy = new Strategy(new UsdComprator());
        $this->assertSame($this->expectedSortedUsd, $strategy->getSortedRates());

    }

    public function testGetCheapestUsd()
    {
        $strategy = new Strategy(new UsdComprator());
        $this->assertSame($this->expectedCheapestUsd, $strategy->getCheapestRate());

    }

    public function testGetCheapestGbp()
    {
        $strategy = new Strategy(new GbpComprator());
        $this->assertSame($this->expectedCheapestGbp, $strategy->getCheapestRate());

    }
}
