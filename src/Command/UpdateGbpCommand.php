<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Repository\SiraliKurRepository;
use App\Repository\UcuzKurRepository;
use App\Currency\Database\Save;
use Symfony\Component\Console\Question\ConfirmationQuestion;

class UpdateGbpCommand extends Command
{
    protected static $defaultName = 'currency:update-gbp';

    protected function configure()
    {
        $this
            ->setName('currency:update-gbp')
            ->setDescription('Sterlin günceller.')
            ->setHelp('Sterlin için güncel sonuçları veritabanına ekler.')
        ;
    }

    public function __construct(SiraliKurRepository $skRepo, UcuzKurRepository $ucRepo)
    {
        parent::__construct();
        $this->save = new Save($skRepo, $ucRepo);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if($this->save->saveGbp()){
            $output->writeln('Gbp güncellendi.');
        }else {
            $helper = $this->getHelper('question');
            $question = new ConfirmationQuestion("Şuanda veritabanında veri yok.\nBu nedenle sadece bir para birimini güncelleyemezsiniz.\nTüm Para birimleri ile işleme devam etmeyi onaylıyor musunuz? y/n", false);
            if (!$helper->ask($input, $output, $question)) {
                $output->writeln('Güncelleme işlemi yapılmadı!');
                return;
            }
            $this->save->saveAll();
            $output->writeln('Tüm para birimleri güncellendi.');
        }


    }
}
