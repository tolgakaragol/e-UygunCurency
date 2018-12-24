<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 12/24/2018
 * Time: 5:02 AM
 */

namespace App\Currency\Database;

use App\Repository\SiraliKurRepository;
use App\Repository\UcuzKurRepository;
use App\Currency\Strategy as ST;

class Update implements UpdateInterface
{
    protected $skRepo;
    protected $ucRepo;

    public function __construct(SiraliKurRepository $skRepo, UcuzKurRepository $ucRepo)
    {
        $this->skRepo = $skRepo;
        $this->ucRepo = $ucRepo;

    }

    public function hasCurrency(): bool
    {
        return ($this->skRepo->hasCurrency() && $this->ucRepo->hasCurrency());
    }

    public function updateUsd(): bool
    {
        if (!$this->hasCurrency()) return false;

        $rates = new ST\Strategy(new ST\UsdComprator());
        $sortedRates = $rates->getSortedRates();
        $cheapestRates = $rates->getCheapestRate();
        $this->skRepo->updateUsd($sortedRates);
        $this->ucRepo->updateUsd($cheapestRates);

        return true;
    }

    public function updateEur(): bool
    {
        if (!$this->hasCurrency()) return false;

        $rates = new ST\Strategy(new ST\EurComprator());
        $sortedRates = $rates->getSortedRates();
        $cheapestRates = $rates->getCheapestRate();
        $this->skRepo->updateEur($sortedRates);
        $this->ucRepo->updateEur($cheapestRates);

        return true;
    }

    public function updateGbp(): bool
    {
        if (!$this->hasCurrency()) false;

        $rates = new ST\Strategy(new ST\GbpComprator());
        $sortedRates = $rates->getSortedRates();
        $cheapestRates = $rates->getCheapestRate();
        $this->skRepo->updateGbp($sortedRates);
        $this->ucRepo->updateGbp($cheapestRates);

        return true;
    }
}