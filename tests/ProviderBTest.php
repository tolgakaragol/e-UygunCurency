<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Currency\Provider\Providers\ProviderB;

class ProviderBTest extends TestCase
{
    private $expectedResults;

    public function setup()
    {
        $this->expectedResults = [
            'apiUrl'    => 'http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3',
            'usd'       => (float) 4.14234,
            'eur'       => (float) 4.68234,
            'gbp'       => (float) 5.01234
        ];
        $this->providerB = new ProviderB();
    }

    public function testGetApiUrl()
    {
        $this->setup();
        $this->assertSame($this->expectedResults['apiUrl'], $this->providerB->getApiUrl());
    }

    public function testGetUsd()
    {
        $this->setup();
        $this->assertEquals($this->expectedResults['usd'], $this->providerB->getUsd());
    }

    public function testGetEur()
    {
        $this->setup();
        $this->assertEquals($this->expectedResults['eur'], $this->providerB->getEur());
    }

    public function testGetGbp()
    {
        $this->setup();
        $this->assertEquals($this->expectedResults['gbp'], $this->providerB->getGbp());
    }
}
