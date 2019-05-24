<?php
namespace App\Command;

use App\Entity\Races;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use App\Entity\DriverStandings;
use App\Entity\Results;
use App\Entity\SummarySeason;

class SummarySeasonCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'create:summary';

    private $entityManager;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

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
            ->addArgument('year', InputArgument::REQUIRED, 'Year to use (ex. "2018").')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // dislay start message
        $output->writeln([
            'Filling entity SummarySeason',
            '============',
            '',
            'year: '.$input->getArgument('year'),
            ''
        ]);

        // get year from input
        $year = (int)$input->getArgument('year');

        // select the first race of one year
        $firstRace = $this->entityManager->getRepository(Races::class)
            ->findOneBy([
                'year' => $year,
                'round' => 1
            ]);

        // get all drivers for one year
        $drivers = [];
        foreach ($firstRace->getResults() as $results){
            $drivers[] = $results->getDriver();
        }

        // loop for every driver and create one SummarySeason in doctrine
        foreach ($drivers as $driver) {
            // check for an old summarySeason data
            $old = $this->entityManager->getRepository(SummarySeason::class)
                ->findOneBy([
                    'driver' => $driver,
                    'year' => $year
                ]);

            if (!is_null($old)){
                continue;
            }

            // select all results for one driver in one season
            $results = $this->entityManager->getRepository(Results::class)
                ->findByYearAndDriver($year, $driver);

            // temp array to calculate average data
            $tmp = [];
            $tmp['cumulativeTime'] = 0;
            $tmp['fastestLapSpeed'] = 0;
            $tmp['mediumGrid'] = 0;
            $tmp['total'] = 0;
            // add data for each results
            foreach ($results as $result){
                $tmp['cumulativeTime'] += (int)$result->getMilliseconds();
                $tmp['fastestLapSpeed'] = $tmp['fastestLapSpeed'] < $result->getFastestLapSpeed() ? (float)$result->getFastestLapSpeed() : $tmp['fastestLapSpeed'];
                $tmp['mediumGrid'] += (int)$result->getRank();
                $tmp['total'] ++;
                $tmp['constructor'] = $result->getConstructor();
            }

            // calculate average and time from hours from milliseconds
            $hours = (int) ($tmp['cumulativeTime'] / (1000 * 60 * 60));
            $minutes = (int) (($tmp['cumulativeTime']-($hours * 1000 * 60 * 60)) / (1000 * 60));
            $seconds = (($tmp['cumulativeTime']-((($hours * 60) + $minutes) * 1000 * 60)) / 1000);

            // add data to object
            $summarySeason = new SummarySeason();
            $summarySeason->setYear($year);
            $summarySeason->setDriver($driver);
            $summarySeason->setConstructor($tmp['constructor']);
            $summarySeason->setCumulativeTime($hours . ':' . $minutes . ':' . $seconds);
            $summarySeason->setFastestLapSpeed($tmp['fastestLapSpeed']);
            $summarySeason->setMediumGrid(round($tmp['mediumGrid']/$tmp['total']));

            // select driverStandings data
            $driverStanding = $this->entityManager->getRepository(DriverStandings::class)
                ->findLastByDriver($driver);

            $summarySeason->setScore($driverStanding->getPoints());
            $summarySeason->setPosition($driverStanding->getPosition());
            $summarySeason->setWins($driverStanding->getWins());

            // persist to doctrine
            $this->entityManager->persist($summarySeason);
            $this->entityManager->flush();
        }

        // display end message
        $output->writeln('Entity SummarySeason filled !');
    }
}