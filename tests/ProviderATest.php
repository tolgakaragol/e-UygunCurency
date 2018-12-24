<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Currency\Provider\Providers\ProviderA;

class ProviderATest extends TestCase
{
    public $expectedResults;

    public function __construct()
    {
        parent::__construct();
        $this->expectedResults = [
            'apiUrl'    => 'http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0',
            'usd'       => (float) 4.15234,
            'eur'       => (float) 4.67234,
            'gbp'       => (float) 5.00234
        ];
        $this->providerA = new ProviderA();
    }

    public function testGetApiUrl()
    {
        $this->assertSame($this->expectedResults['apiUrl'], $this->providerA->getApiUrl());
    }

    public function testGetUsd()
    {
        $this->assertEquals($this->expectedResults['usd'], $this->providerA->getUsd());
    }

    public function testGetEur()
    {
        $this->assertEquals($this->expectedResults['eur'], $this->providerA->getEur());
    }

    public function testGetGbp()
    {
        $this->assertEquals($this->expectedResults['gbp'], $this->providerA->getGbp());
    }
}
