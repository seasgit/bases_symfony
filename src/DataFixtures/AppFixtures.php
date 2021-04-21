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
                'parution' => new DateTime('2020/01/09'),
                'resume' => "Et s'il existait un Plan ? Si tout ce que nous vivions avait été placé sur notre chemin pour nous permettre de nous accomplir ?",
                'price' => '20.45€'
            ],
            [
                'title' => "Kilomètre zéro",
                'cover' => "kilometre-zero.jpg",
                'parution' => new DateTime('2017/09/21'),
                'resume' => "Et vous, jusqu'où irez-vous pour sauver une amie ? Maëlle, directrice financière d'une start-up en pleine expansion, vit le rythme effréné de ses journées ; sa vie se résume au travail, au luxe et à sa salle de sport. ",
                'price' => '22.15€'
            ],
            [
                'title' => "Féminité sacrée",
                'cover' => "feminite-sacree.jpg",
                'parution' => new DateTime('2020/04/06'),
                'resume' => "En choisissant d'ouvrir cet oracle, vous décidez de prendre en main votre destin de femme sauvage en vous libérant de tous vos conditionnements, de tous vos carcans, afin de retrouver une totale liberté d'être et ainsi vivre pleinement votre destinée et vos rêves. ",
                'price' => '23.10€'
            ],
        ];

        foreach ($data as  $b) {
            $b = (object) $b;
            $book =  new Book;
            $book
                ->setTitle($b->title)
                ->setCover($b->cover)
                ->setParution($b->parution)
                ->setResume($b->resume)
                ->setPrice($b->price);

            $manager->persist($book);
        }
        // a la fin
        $manager->flush();
    }
}
