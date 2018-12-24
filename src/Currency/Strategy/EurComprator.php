<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 12/22/2018
 * Time: 11:38 PM
 */

namespace App\Currency\Strategy;

use App\Currency\Provider;

class EurComprator extends ComparatorAbstract implements CompratorInterface
{
    public function findMinAndSort()
    {
        $this->sortedRates = $this->sorter($this->rates['eur']);

        $this->cheapestRate = $this->getMinimum($this->sortedRates);
    }

    public function getSortedRates(): array
    {
        return $this->sortedRates;
    }

    public function getCheapestRate(): array
    {
        return $this->cheapestRate;
    }
}