<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 12/23/2018
 * Time: 3:59 PM
 */

namespace App\Currency\Provider;

interface AllProvidersInterface
{
    public function getAllRates(): array;
}