<?php
namespace App\Command;

use App\Entity\Status;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ImportCsvCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'import:csv';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
//        $encoders = [new CsvEncoder()];
//        $normalizer = new ObjectNormalizer();
//        $serializer = new Serializer([$normalizer], $encoders);
//
//        $data = file('');
//        $status = $serializer->deserialize($data, Status::class, 'csv');

        $output->writeln('User successfully generated!');
    }
}