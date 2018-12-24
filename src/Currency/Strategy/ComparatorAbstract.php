<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 12/22/2018
 * Time: 11:08 PM
 */

namespace App\Currency\Strategy;

use App\Currency\Provider\AllProviders;

abstract class ComparatorAbstract
{
    protected $rates;
    protected $sortedRates;
    protected $cheapestRate;

    public function __construct(){
        $providers = new AllProviders();
        $this->rates = $providers->getAllRates();
    }

    abstract public function findMinAndSort();
    abstract public function getSortedRates(): array;
    abstract public function getCheapestRate(): array;

    protected function sorter(array $elements){
        uasort($elements, [$this, 'comprator']);
        return $this->keyRenamer($elements);
    }

    protected function comprator($a, $b){
        return $a['rate'] <=> $b['rate'];
    }

    protected function keyRenamer(array $elements)
    {
        $array = array();
        foreach ($elements as $element) {
            $array[] = $element;
        }
        return $array;
    }

    protected function getMinimum($array){
        return reset($array);
    }




}