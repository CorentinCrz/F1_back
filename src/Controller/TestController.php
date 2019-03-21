<?php

namespace App\Controller;

use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use App\Entity\Status;
use Symfony\Component\Routing\Annotation\Route;

class TestController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $encoders = [new CsvEncoder()];
        $normalizer = new ObjectNormalizer();
        $serializer = new Serializer([$normalizer], $encoders);

        $data = file('');
        $status = $serializer->deserialize($data, Status::class, 'csv');
    }
}