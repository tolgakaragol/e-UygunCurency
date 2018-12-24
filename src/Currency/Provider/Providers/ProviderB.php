<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 12/22/2018
 * Time: 2:31 PM
 */

namespace App\Currency\Provider\Providers;

use App\Currency\Provider;

class ProviderB implements ProviderInterface
{
    const APIURL = 'http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3';
    const CURRENCYKEY = 'kod';
    const RATEKEY = 'oran';
    const ISARRAY = null;
    const USDKEY = 'DOLAR';
    const EURKEY = 'AVRO';
    const GBPKEY = 'İNGİLİZ STERLİNİ';

    private $rates;

    public function ready(){}

    public function __construct()
    {
        $this->getCurrenciesFromApi();
    }

    private function getCurrenciesFromApi()
    {
        $data = json_decode(file_get_contents(self::APIURL), true);

        if (is_null(self::ISARRAY))
            array_walk($data, array($this, 'setRates'));
        else
            array_walk($data[self::ISARRAY], array($this, 'setRates'));
    }

    private function setRates($currency)
    {
        switch ($currency[self::CURRENCYKEY]){
            case self::USDKEY:
                $this->rates['usd'] = $currency[self::RATEKEY];
                break;
            case self::EURKEY:
                $this->rates['eur'] = $currency[self::RATEKEY];
                break;
            case self::GBPKEY:
                $this->rates['gbp'] = $currency[self::RATEKEY];
                break;
        }
    }

    public function getApiUrl()
    {
        return self::APIURL;
    }
    public function getUsd(): float
    {
        return $this->rates['usd'];
    }
    public function getEur(): float
    {
        return $this->rates['eur'];
    }
    public function getGbp(): float
    {
        return $this->rates['gbp'];
    }
}