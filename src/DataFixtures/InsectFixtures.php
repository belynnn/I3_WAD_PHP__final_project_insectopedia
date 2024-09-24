<?php

namespace App\DataFixtures;

// use Faker\Factory;
use App\Entity\Insect;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class InsectFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $faker = Factory::create('fr_BE');

        // for ($i = 0; $i < 2; $i++) {
        //     $insect = new Insect([
        //         'nameInsect' => "Paon-du-Jour",
        //         'species' => "Aglais io",
        //         'description' => "Contrairement à bon nombre de lépidoptères, il ne présente pas de variations géographiques ou saisonnières, d'où une remarquable stabilité morphologique sur l'ensemble de son aire.
                
        //         Le Paon-du-jour adulte (imago) est de taille moyenne (entre 5 et 6 cm d'envergure). Il est aisément identifiable par ses ocelles (yeux) vifs sur un fond vermeil qui rappellent ceux des plumes de paon (d'où son nom vernaculaire). Le revers brun de ses ailes lui permet de se glisser au sein des feuilles mortes sans qu'il soit visible. Les ocelles sont exposés rapidement lorsque le papillon est troublé par un prédateur tel qu'un oiseau. Cette démonstration brutale de l'éclat de ses ailes, accompagnée par l'effleurement des ailes ouvertes (qui crée un bruit de sifflement), effraie et repousse l'importun.
                
        //         Après l'accouplement, le Paon-du-jour pond ses oeufs par séries, jusqu'à 500 à la fois amassés au revers des feuilles de la plante nourricière (majoritairement des Orties dioïques). Les oeufs sont de couleur pâle, allant du jaune au vert. L'oeuf présente huit fines arêtes longitudinales et libère la chenille au bout de deux à trois semaines d'incubation.",
        //         'kingdom' => "Animalia",
        //         'phylum' => "Arthropoda",
        //         'class' => "Insecta",
        //         'orderInsect' => "Lepidoptera",
        //         'family' => "Nymphalidae",
        //         'describedBy' => "Linné",
        //         'yearDescribed' => \DateTime::createFromFormat('Y', 1758),
        //         'activity' => "Avril et Juillet",
        //         'cycle' => "Nous n'avons pas l'état de conservation pour ce taxon",
        //         'image' => "https://inaturalist-open-data.s3.amazonaws.com/photos/313969552/large.jpeg",
        //     ]);
        //     $manager->persist($insect);
        // }
        // $manager->flush();
    }
}