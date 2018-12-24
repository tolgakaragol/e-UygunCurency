<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 12/24/2018
 * Time: 4:59 AM
 */

namespace App\Currency\Database;


interface UpdateInterface
{
    public function hasCurrency(): bool;
    public function updateUsd(): bool;
    public function updateEur(): bool;
    public function updateGbp(): bool;
}