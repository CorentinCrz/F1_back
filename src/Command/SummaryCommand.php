<?php
namespace App\Command;

use App\Entity\ConstructorStandings;
use App\Entity\PitStops;
use App\Entity\Races;
use App\Entity\SummarySeasonConstructor;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use App\Entity\DriverStandings;
use App\Entity\Results;
use App\Entity\SummarySeason;

class SummaryCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'create:summaries';

    public function __construct()
    {

        parent::__construct();
    }

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Select data in entities and summery them in SummarySeason entity')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('Select data in entities and summery them in SummarySeason entity by year.')

            // create required argument
            ->addArgument('year', InputArgument::REQUIRED, 'Starting year (must be between 1950 and 2018)')

            // create required argument
            ->addArgument('force', InputArgument::OPTIONAL, 'Erase old data.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $year = (int)$input->getArgument('year');
        if ($year < 1950 || $year > 2018){
            $output->writeln('Please enter a year between 1950 and 2018 !');
        }
        for ($i = $year; $i <= 2018; $i++) {
            $execOutput = [];
            exec('php bin/console create:summary ' . $i . ' ' . $input->getArgument('force'), $execOutput);
            $output->writeln($execOutput);
        }
    }
}