<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 12/22/2018
 * Time: 10:26 PM
 */

namespace App\Currency\Strategy;

class Strategy
{
    /*
     * kullanım:
     *      $euroComprator = new Strategy(new EuroComprator);
     *      $euroSortedRates = $euroComprator->getSortedRates();
     *      $euroCheapestRate = $euroComprator->getCheapestRate();
     */
     public function __construct(CompratorInterface $comparator)
    {
        $this->comparator = $comparator;
    }

    public function getSortedRates()
    {
        $this->comparator->findMinAndSort();
        return $this->comparator->getSortedRates();
    }

    public function getCheapestRate()
    {
        $this->comparator->findMinAndSort();
        return $this->comparator->getCheapestRate();
    }
}