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


class UpdateAllCommand extends Command
{
    protected static $defaultName = 'currency:update-all';
    protected $save;

    public function __construct(SiraliKurRepository $skRepo, UcuzKurRepository $ucRepo)
    {
        parent::__construct();
        $this->save = new Save($skRepo, $ucRepo);
    }

    protected function configure()
    {
        $this
            ->setName('currency:update-all')
            ->setDescription('Tüm para birimlerini günceller.')
            ->setHelp('Tüm para birimlerini karşılaştırarak güncel sonuçları veritabanına ekler.')
        ;
    }

    protected function execute(InputInterface $input,  OutputInterface $output)
    {
        $this->save->saveAll();
        $output->writeln('Tüm para birimleri güncellendi.');
    }
}
