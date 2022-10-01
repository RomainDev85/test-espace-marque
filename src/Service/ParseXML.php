<?php

namespace App\Service;

use App\Entity\Movie;
use Doctrine\Persistence\ManagerRegistry;

class ParseXML
{
    public function parseFile(ManagerRegistry $doctrine)
    {
        $data = simplexml_load_file("../Data/data.xml");
        $entityManager = $doctrine->getManager();

        
        foreach($data as $element){
            $movie = new Movie();

            $movie->setTitle($element->title);
            $movie->setGenre($element->genre);
            $movie->setDescription($element->description);
            $movie->setDirector($element->director);
            $movie->setYear(intval($element->year));
            $movie->setRuntime(intval($element->runtime));
            $movie->setRate(intval($element->rate));

            $entityManager->persist($movie);
            $entityManager->flush();
        }
    }
}