<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class NewProviderCommand extends Command
{
    protected static $defaultName = 'currency:new-provider';

    protected function configure()
    {
        $this
            ->setName('currency:new-provider')
            ->setDescription('Yeni provider ekler.')
            ->setHelp('Eklenecek olan Apiler için yeni bir provider oluşturur.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $samplePath = __DIR__.'/../Currency/Provider/Providers/sample.provider';
        $yeni = $this->isimBul();
        if (copy($samplePath, $yeni['path'])){
            $output->writeln($yeni['isim'].' başarıylar oluşturuldu.');
            $output->writeln($yeni['path']);
            return;
        }else{
            $output->writeln($yeni['isim'].' oluşturulurken bir hata meydana geldi..');
            return;
        }

    }

    protected function isimBul($isim=null)
    {
        if (is_null($isim) || $this->providerExist($isim))
        {
            $r = rand(0, 24);
            $rasgeleKarakter = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),$r , 2);
            $isim = 'Provider'.$rasgeleKarakter;
            $this->isimBul($isim);
        }
        return ['isim'=> $isim,
            'path' =>__DIR__.'/../Currency/Provider/Providers/'.$isim.'.php'];

    }

    protected function providerExist($isim)
    {
        return file_exists(__DIR__.'/../Currency/Provider/Providers/'.$isim.'.php');
    }
}
