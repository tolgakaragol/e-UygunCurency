<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 12/23/2018
 * Time: 4:07 PM
 */

namespace App\Currency\Provider;

class AllProviders implements AllProvidersInterface
{
    private $providerNames;

    public function __construct()
    {
        $this->providerNames = $this->getProviderNames();

    }

    private function getProviderNames()
    {
        $providerPaths = glob(__DIR__.'/Providers/Provider*.php');

        return array_map([$this, 'basenameWithoutPhp'], $providerPaths);
    }

    private function basenameWithoutPhp($path)
    {
        return basename($path, '.php');
    }

    public function getAllRates(): array
    {

        foreach ($this->providerNames as $providerName) {
            $namespace = 'App\\Currency\\Provider\\Providers\\'.$providerName;

            //Hatalı veya eklenmesi tamamlanmamış Providerların hataya sebep olmasını önler.
            if (!class_exists($namespace) && !method_exists($namespace, 'ready')) continue;

            $currentProvider = new $namespace();

            $apiUrl = $currentProvider->getApiUrl();

            $rates['usd'][] = array(
                'apiUrl'    => $apiUrl,
                'rate'      => $currentProvider->getUsd()
            );
            $rates['eur'][] = array(
                'apiUrl'    => $apiUrl,
                'rate'      => $currentProvider->getEur()
            );
            $rates['gbp'][] = array(
                'apiUrl'    => $apiUrl,
                'rate'      => $currentProvider->getGbp()
            );
        }
        return $rates;
    }
}