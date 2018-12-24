<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 12/23/2018
 * Time: 5:07 PM
 */

namespace App\Currency\Strategy;

interface CompratorInterface
{
    public function findMinAndSort();
    public function getSortedRates(): array;
    public function getCheapestRate(): array;
}