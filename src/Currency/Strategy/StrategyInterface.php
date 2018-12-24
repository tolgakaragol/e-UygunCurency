<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 12/23/2018
 * Time: 9:41 PM
 */

namespace App\Currency\Strategy;

interface StrategyInterface
{
    public function getSortedRates(): array;
    public function getCheapestRate(): array;
}