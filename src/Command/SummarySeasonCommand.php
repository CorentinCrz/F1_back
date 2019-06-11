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

class SummarySeasonCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'create:summary';

    private $entityManager;

    private $year;
    private $force;


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

            // create required argument
            ->addArgument('force', InputArgument::OPTIONAL, 'Erase old data.')
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
        $this->year = (int)$input->getArgument('year');
        $this->force = $input->getArgument('force') === 'force' ? true : false;

        // select the first race of one year
        $firstRace = $this->entityManager->getRepository(Races::class)
            ->findOneBy([
                'year' => $this->year,
                'round' => 1
            ]);

        // get all drivers for one year
        $drivers = [];
        $constructors = [];
        foreach ($firstRace->getResults() as $results){
            $drivers[] = $results->getDriver();
            $constructors[] = $results->getConstructor();
        }

        $this->loop(array_unique($constructors), false);
        $this->loop($drivers);

        // display end message
        $output->writeln('Entity SummarySeason filled !');
    }

    public function loop($array, $isDriver = true)
    {
        // loop for every driver/constructor and create one SummarySeason/SummarySeasonConstructor in doctrine
        foreach ($array as $driverOrConstructor) {
            // check for an old summarySeason/summarySeasonConstructor data
            $query = $isDriver ? [
                'driver' => $driverOrConstructor,
                'year' => $this->year
            ] : [
                'constructor' => $driverOrConstructor,
                'year' => $this->year
            ];
            $old = $this->entityManager->getRepository($isDriver ? SummarySeason::class : SummarySeasonConstructor::class)//
            ->findOneBy($query);

            if (!is_null($old)){
                if ($this->force){
                    $this->entityManager->remove($old);
                } else {
                    continue;
                }
            }

            // select all results for one driver/constructor in one season
            $resultRepository = $this->entityManager->getRepository(Results::class);
            $results = $isDriver ? $resultRepository->findByYearAndDriver($this->year, $driverOrConstructor) : $resultRepository->findByYearAndConstructor($this->year, $driverOrConstructor);

            // temp array to calculate average data
            $tmp = [];
            $tmp['cumulativeTime'] = 0;
            $tmp['fastestLapSpeed'] = 0;
            $tmp['mediumGrid'] = 0;
            $tmp['total'] = 0;
            $tmp['lastRound'] = 0;
            $tmp['drivers'] = [];
            $tmp['pit_stops'] = [];
            // add data for each results
            foreach ($results as $result){
                $tmp['cumulativeTime'] += (int)$result->getMilliseconds();
                $tmp['fastestLapSpeed'] = $tmp['fastestLapSpeed'] < $result->getFastestLapSpeed() ? (float)$result->getFastestLapSpeed() : $tmp['fastestLapSpeed'];
                $tmp['lastRound'] = $tmp['lastRound'] < $result->getRace()->getRound() ? (int)$result->getRace()->getRound() : $tmp['lastRound'];
                $tmp['mediumGrid'] += (int)$result->getRank();
                $tmp['total'] ++;
                $tmp['constructor'] = $result->getConstructor();
                $tmp['drivers'][] = $result->getDriver();
                if (!$isDriver) {
                    $pitStops = $this->entityManager->getRepository(PitStops::class)
                        ->findBy([
                            'race' => $result->getrace(),
                            'driver' => $result->getDriver()
                        ]);
                    foreach ($pitStops as $pitStop){
                        $tmp['pit_stops'][] = $pitStop->getMilliseconds();
                    }
                }
            }
            $tmp['drivers'] = array_unique($tmp['drivers']);

            // calculate average and time from hours from milliseconds
            $hours = (int) ($tmp['cumulativeTime'] / (1000 * 60 * 60));
            $minutes = (int) (($tmp['cumulativeTime']-($hours * 1000 * 60 * 60)) / (1000 * 60));
            $seconds = (($tmp['cumulativeTime']-((($hours * 60) + $minutes) * 1000 * 60)) / 1000);

            // add data to object
            $summarySeason = $isDriver ? new SummarySeason() : new SummarySeasonConstructor();
            $summarySeason->setYear($this->year);
            if ($isDriver){
                $summarySeason->setDriver($driverOrConstructor);
                $summarySeason->setConstructor($tmp['constructor']);
            } else {
                $temp = 0;
                foreach ($tmp['pit_stops'] as $pitStop){
                    $temp += $pitStop;
                }
                $summarySeason->setPitStopTime($temp / count($tmp['pit_stops']));
                $summarySeason->setConstructor($driverOrConstructor);
                foreach ($tmp['drivers'] as $dri) {
                    $summarySeason->addDriver($dri);
                }
            }
            $summarySeason->setCumulativeTime($hours . ':' . $minutes . ':' . $seconds);
            $summarySeason->setCumulativeMillisecond($tmp['cumulativeTime']);
            $summarySeason->setFastestLapSpeed($tmp['fastestLapSpeed']);
            $summarySeason->setMediumGrid(round($tmp['mediumGrid']/$tmp['total']));

            // select driverStandings/constructorStandings data
            $driverStanding = $this->entityManager->getRepository($isDriver ? DriverStandings::class : ConstructorStandings::class)
                ->findLastByDriverAndYear($driverOrConstructor, $this->year, $tmp['lastRound']);

            $summarySeason->setScore($driverStanding->getPoints());
            $summarySeason->setPosition($driverStanding->getPosition());
            $summarySeason->setWins($driverStanding->getWins());

            // persist to doctrine
            $this->entityManager->persist($summarySeason);
            $this->entityManager->flush();
        }
    }
}