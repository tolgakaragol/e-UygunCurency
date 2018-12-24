<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 12/22/2018
 * Time: 12:02 PM
 */

namespace App\Currency\Provider\Providers;

interface ProviderInterface
{
    public function getApiUrl();
    public function getUsd(): float;
    public function getEur(): float;
    public function getGbp(): float;
}