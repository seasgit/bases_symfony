<?php

namespace App\DataFixtures;

use App\Entity\Book;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    // $manager est un service injecté (injection de dépendance)
    public function load(ObjectManager $manager)
    {
        $data =  [
            [
                'title' => "Respire !",
                'cover' => "respire.jpg",
                'parution' => new DateTime('2020/01/09')
            ],
            [
                'title' => "Kilomètre zéro",
                'cover' => "kilometre-zero.jpg",
                'parution' => new DateTime('2017/09/21')
            ],
            [
                'title' => "Féminité sacrée",
                'cover' => "feminite-sacree.jpg",
                'parution' => new DateTime('2020/04/06')
            ],
        ];

        foreach ($data as  $b) {
            $b = (object) $b;
            $book =  new Book;
            $book
                ->setTitle($b->title)
                ->setCover($b->cover)
                ->setParution($b->parution);

            $manager->persist($book);
        }
        // a la fin
        $manager->flush();
    }
}
