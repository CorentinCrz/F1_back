<?php
namespace App\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class WikiApiImageCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'wiki:image';

    private $entityManager;

    // list af all authorize entity
    private $authorizeEntity = ['Drivers'];

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Get thumbnail image form Wikipedia')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command calls wikimedia\'api and adds the thumbnails image url in our database.')

            // create required argument
            ->addArgument('entity', InputArgument::REQUIRED, 'The entity to use.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // dislay start message
        $output->writeln([
            'Wikimedia\'s api call',
            '============',
            '',
            'entity: '.$input->getArgument('entity'),
            '',
        ]);

        // wrong entity or doesn't exist => stop
        if (!in_array($input->getArgument('entity'), $this->authorizeEntity)){
            $output->writeln('WARNING : This entity doesn\'t have wikipedia\'s url or image\'s url');
            return;
        }

        // find all for selected entity
        $data = $this->entityManager->getRepository('App\\Entity\\' . $input->getArgument('entity'))
            ->findAll();

        // loop on object list
        foreach ($data as $object){

            // call wikimedia's api => query with wikipedia's article url
            $parts = parse_url($object->getUrl());
            $json = file_get_contents('https://en.wikipedia.org/w/api.php?action=query&prop=pageimages&format=json&pithumbsize=500&titles=' . substr($parts['path'], 6));

            // get the image source in the response
            $array = json_decode($json, true);
            if (isset($array['query']['pages']))
                foreach ($array['query']['pages'] as $temp){
                    if (isset($temp['thumbnail']['source'])){

                        // set and flush data
                        $object->setImgUrl($temp['thumbnail']['source']);
                        $this->entityManager->persist($object);
                        $this->entityManager->flush();
                    }
                    break;
                }
        }

        // display end message
        $output->writeln('Import done');
    }
}