<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 12/22/2018
 * Time: 12:21 PM
 */

namespace App\Currency\Provider\Providers;

class ProviderA implements ProviderInterface
{
    const APIURL = 'http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0';
    const CURRENCYKEY = 'symbol';
    const RATEKEY = 'amount';
    const ISARRAY = 'result';
    const USDKEY = 'USDTRY';
    const EURKEY = 'EURTRY';
    const GBPKEY = 'GBPTRY';

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