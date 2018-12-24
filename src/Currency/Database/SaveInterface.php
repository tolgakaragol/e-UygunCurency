<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 12/24/2018
 * Time: 2:14 AM
 */

namespace App\Currency\Database;

interface SaveInterface
{
    public function saveUsd(): bool;
    public function saveEur(): bool;
    public function saveGbp(): bool;
    public function saveAll();
}