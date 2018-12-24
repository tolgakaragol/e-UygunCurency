<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 12/24/2018
 * Time: 2:03 AM
 */

namespace App\Currency\Database;

use App\Repository\SiraliKurRepository;
use App\Repository\UcuzKurRepository;
use App\Currency\Strategy as ST;

class Save implements SaveInterface
{
    protected $skRepo;
    protected $ucRepo;
    protected $update;

    public function __construct(SiraliKurRepository $skRepo, UcuzKurRepository $ucRepo)
    {
        $this->skRepo = $skRepo;
        $this->ucRepo = $ucRepo;
        $this->update = new Update($skRepo, $ucRepo);
    }

    public function saveUsd(): bool
    {
        return $this->update->updateUsd();
    }

    public function saveEur(): bool
    {
        return $this->update->updateEur();
    }

    public function saveGbp(): bool
    {
        return $this->update->updateGbp();
    }

    public function saveAll()
    {
        $rates = new ST\Strategy(new ST\AllComprator());

        $sortedRates = $rates->getSortedRates();
        $cheapestRates = $rates->getCheapestRate();

        $this->skRepo->insertCurrencies($sortedRates);
        $this->ucRepo->insertCurrencies($cheapestRates);
    }
}