<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 12/23/2018
 * Time: 12:28 AM
 */

namespace App\Currency\Strategy;

use App\Currency\Provider;

class AllComprator extends ComparatorAbstract implements CompratorInterface
{

    public function findMinAndSort()
    {
        $this->sortedRates['usd'] = $this->sorter($this->rates['usd']);
        $this->sortedRates['eur'] = $this->sorter($this->rates['eur']);
        $this->sortedRates['gbp'] = $this->sorter($this->rates['gbp']);

        $this->cheapestRate['usd'] = $this->getMinimum($this->sortedRates['usd']);
        $this->cheapestRate['eur'] = $this->getMinimum($this->sortedRates['eur']);
        $this->cheapestRate['gbp'] = $this->getMinimum($this->sortedRates['gbp']);
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