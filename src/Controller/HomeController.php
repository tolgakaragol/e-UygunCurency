<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Tests\Compiler\D;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SiraliKurRepository;
use App\Repository\UcuzKurRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(SiraliKurRepository $skRepo, UcuzKurRepository $ucRepo)
    {
        $ucuzKurlar = $ucRepo->getLatest()[0];
        //print_r($ucuzKurlar);die;
        $enUcuzKurlar = [
            'usdRate' => $ucuzKurlar['usdRate'],
            'eurRate' => $ucuzKurlar['eurRate'],
            'gbpRate' => $ucuzKurlar['gbpRate'],
            'usdApiUrl' => $ucuzKurlar['usdApiUrl'],
            'eurApiUrl' => $ucuzKurlar['eurApiUrl'],
            'gbpApiUrl' => $ucuzKurlar['gbpApiUrl']
        ];
        $siralanmisKurlar = $skRepo->getLatest()[0];
        unset($siralanmisKurlar['id']);
        //var_dump($siralanmisKurlar);
        $kurSiralamalari = [
            'Usd' => $siralanmisKurlar['usd'],
            'Eur' => $siralanmisKurlar['eur'],
            'Gbp' => $siralanmisKurlar['gbp']
        ];


        return $this->render('home/home.html.twig',
            [   'title' => 'e-UygunCurrency',
                'enUcuzKurlar' => $ucuzKurlar,
                'kurSiramalari' => $siralanmisKurlar
            ]);
    }
}
