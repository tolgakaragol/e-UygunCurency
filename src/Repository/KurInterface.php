<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 12/24/2018
 * Time: 5:46 AM
 */

namespace App\Repository;


interface KurInterface
{
    public function getLatest();
    public function hasCurrency();
    public function updateUsd($rates);
    public function updateEur($rates);
    public function updateGbp($rates);
    public function insertCurrencies($rates);
}