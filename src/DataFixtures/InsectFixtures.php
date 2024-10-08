<?php

namespace App\DataFixtures;

use App\Entity\Insect;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class InsectFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = [
            [
                "name_insect" => "Fourmi rousse",
                "species" => "Formica rufa",
                "description" => "Fourmi des bois, connue pour ses nids de feuilles.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Hymenoptera",
                "family" => "Formicidae",
                "described_by" => "Linnaeus",
                "year_described" => "1761",
                "activity_time" => "Diurne",
                "life_cycle" => "Métamorphose complète",
                "image" => "https://static.inaturalist.org/photos/83666831/medium.jpg"
            ],
            [
                "name_insect" => "Papillon Monarque",
                "species" => "Danaus plexippus",
                "description" => "Papillon migrateur célèbre pour ses longues migrations.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Lepidoptera",
                "family" => "Nymphalidae",
                "described_by" => "Linnaeus",
                "year_described" => "1758",
                "activity_time" => "Diurne",
                "life_cycle" => "Métamorphose complète",
                "image" => "https://inaturalist-open-data.s3.amazonaws.com/photos/13824507/medium.jpg"
            ],
            [
                "name_insect" => "Coccinelle à sept points",
                "species" => "Coccinella septempunctata",
                "description" => "Insecte bénéfique pour l'agriculture, connu pour ses points noirs.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Coleoptera",
                "family" => "Coccinellidae",
                "described_by" => "Linnaeus",
                "year_described" => "1758",
                "activity_time" => "Diurne",
                "life_cycle" => "Métamorphose complète",
                "image" => "https://inaturalist-open-data.s3.amazonaws.com/photos/5669923/medium.jpg"
            ],
            [
                "name_insect" => "Sauterelle verte",
                "species" => "Tettigonia viridissima",
                "description" => "Grand insecte sauteur avec un corps vert vif.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Orthoptera",
                "family" => "Tettigoniidae",
                "described_by" => "Linnaeus",
                "year_described" => "1758",
                "activity_time" => "Nocturne",
                "life_cycle" => "Métamorphose incomplète",
                "image" => "https://static.inaturalist.org/photos/98388966/medium.jpg"
            ],
            [
                "name_insect" => "Mouche domestique",
                "species" => "Musca domestica",
                "description" => "Insecte volant commun dans les environnements humains.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Diptera",
                "family" => "Muscidae",
                "described_by" => "Linnaeus",
                "year_described" => "1758",
                "activity_time" => "Diurne",
                "life_cycle" => "Métamorphose complète",
                "image" => "https://inaturalist-open-data.s3.amazonaws.com/photos/79611144/medium.jpeg"
            ],
            [
                "name_insect" => "Abeille domestique",
                "species" => "Apis mellifera",
                "description" => "Insecte pollinisateur producteur de miel.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Hymenoptera",
                "family" => "Apidae",
                "described_by" => "Linnaeus",
                "year_described" => "1758",
                "activity_time" => "Diurne",
                "life_cycle" => "Métamorphose complète",
                "image" => "https://static.inaturalist.org/photos/2369526/medium.jpg"
            ],
            [
                "name_insect" => "Luciole",
                "species" => "Lampyris noctiluca",
                "description" => "Insecte bioluminescent qui émet de la lumière la nuit.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Coleoptera",
                "family" => "Lampyridae",
                "described_by" => "Linnaeus",
                "year_described" => "1767",
                "activity_time" => "Nocturne",
                "life_cycle" => "Métamorphose complète",
                "image" => "https://static.inaturalist.org/photos/80143800/medium.jpg"
            ],
            [
                "name_insect" => "Mante religieuse",
                "species" => "Mantis religiosa",
                "description" => "Insecte carnivore avec une posture distinctive de prière.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Mantodea",
                "family" => "Mantidae",
                "described_by" => "Linnaeus",
                "year_described" => "1758",
                "activity_time" => "Diurne",
                "life_cycle" => "Métamorphose incomplète",
                "image" => "https://inaturalist-open-data.s3.amazonaws.com/photos/180063407/medium.jpg"
            ],
            [
                "name_insect" => "Cicadelle",
                "species" => "Cicadella viridis",
                "description" => "Petit insecte sauteur vert et bleu.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Hemiptera",
                "family" => "Cicadellidae",
                "described_by" => "Linnaeus",
                "year_described" => "1758",
                "activity_time" => "Diurne",
                "life_cycle" => "Métamorphose incomplète",
                "image" => "https://inaturalist-open-data.s3.amazonaws.com/photos/59824645/medium.jpeg"
            ],
            [
                "name_insect" => "Libellule écarlate",
                "species" => "Crocothemis erythraea",
                "description" => "Libellule rouge vive, fréquente dans les zones humides.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Odonata",
                "family" => "Libellulidae",
                "described_by" => "Brullé",
                "year_described" => "1832",
                "activity_time" => "Diurne",
                "life_cycle" => "Métamorphose incomplète",
                "image" => "https://static.inaturalist.org/photos/28170493/large.jpg"
            ],
            [
                "name_insect" => "Doryphore",
                "species" => "Leptinotarsa decemlineata",
                "description" => "Insecte ravageur de la pomme de terre.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Coleoptera",
                "family" => "Chrysomelidae",
                "described_by" => "Say",
                "year_described" => "1824",
                "activity_time" => "Diurne",
                "life_cycle" => "Métamorphose complète",
                "image" => "https://inaturalist-open-data.s3.amazonaws.com/photos/99192927/medium.jpg"
            ],
            [
                "name_insect" => "Sphinx tête de mort",
                "species" => "Acherontia atropos",
                "description" => "Papillon nocturne avec un motif de crâne sur le thorax.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Lepidoptera",
                "family" => "Sphingidae",
                "described_by" => "Linnaeus",
                "year_described" => "1758",
                "activity_time" => "Nocturne",
                "life_cycle" => "Métamorphose complète",
                "image" => "https://inaturalist-open-data.s3.amazonaws.com/photos/263363466/large.jpg"
            ],
            [
                "name_insect" => "Charançon du coton",
                "species" => "Anthonomus grandis",
                "description" => "Petit coléoptère nuisible des cultures de coton.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Coleoptera",
                "family" => "Curculionidae",
                "described_by" => "Boheman",
                "year_described" => "1843",
                "activity_time" => "Diurne",
                "life_cycle" => "Métamorphose complète",
                "image" => "https://inaturalist-open-data.s3.amazonaws.com/photos/89344206/large.jpeg"
            ],
            [
                "name_insect" => "Syrphe ceinturé",
                "species" => "Episyrphus balteatus",
                "description" => "Mouche mimant les guêpes, utile pour la pollinisation.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Diptera",
                "family" => "Syrphidae",
                "described_by" => "De Geer",
                "year_described" => "1776",
                "activity_time" => "Diurne",
                "life_cycle" => "Métamorphose complète",
                "image" => "https://inaturalist-open-data.s3.amazonaws.com/photos/10774/medium.jpg"
            ],
            [
                "name_insect" => "Bourdon terrestre",
                "species" => "Bombus terrestris",
                "description" => "Gros pollinisateur au corps velu.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Hymenoptera",
                "family" => "Apidae",
                "described_by" => "Linnaeus",
                "year_described" => "1758",
                "activity_time" => "Diurne",
                "life_cycle" => "Métamorphose complète",
                "image" => "https://static.inaturalist.org/photos/382707393/large.jpeg"
            ],
            [
                "name_insect" => "Mouche à fruits",
                "species" => "Drosophila melanogaster",
                "description" => "Insecte modèle en biologie, utilisé pour des études génétiques.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Diptera",
                "family" => "Drosophilidae",
                "described_by" => "Meigen",
                "year_described" => "1830",
                "activity_time" => "Diurne",
                "life_cycle" => "Métamorphose complète",
                "image" => "https://inaturalist-open-data.s3.amazonaws.com/photos/330405518/large.jpeg"
            ],
            [
                "name_insect" => "Criquet pèlerin",
                "species" => "Schistocerca gregaria",
                "description" => "Insecte ravageur responsable de terribles invasions.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Orthoptera",
                "family" => "Acrididae",
                "described_by" => "Forskål",
                "year_described" => "1775",
                "activity_time" => "Diurne",
                "life_cycle" => "Métamorphose incomplète",
                "image" => "https://static.inaturalist.org/photos/74136264/medium.jpg"
            ],
            [
                "name_insect" => "Lucane cerf-volant",
                "species" => "Lucanus cervus",
                "description" => "Le plus grand coléoptère d'Europe, connu pour ses impressionnantes mandibules chez le mâle.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Coleoptera",
                "family" => "Lucanidae",
                "described_by" => "Linnaeus",
                "year_described" => "1758",
                "activity_time" => "Nocturne",
                "life_cycle" => "Métamorphose complète",
                "image" => "https://static.inaturalist.org/photos/348296511/medium.jpg"
            ],
            [
                "name_insect" => "Syrphe ceinturé",
                "species" => "Episyrphus balteatus",
                "description" => "Mouche pollinisatrice mimant l'apparence d'une guêpe.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Diptera",
                "family" => "Syrphidae",
                "described_by" => "De Geer",
                "year_described" => "1776",
                "activity_time" => "Diurne",
                "life_cycle" => "Métamorphose complète",
                "image" => "https://inaturalist-open-data.s3.amazonaws.com/photos/10774/medium.jpg"
            ],
            [
                "name_insect" => "Morio",
                "species" => "Nymphalis antiopa",
                "description" => "Papillon aux ailes sombres bordées de jaune, visible dans les forêts.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Lepidoptera",
                "family" => "Nymphalidae",
                "described_by" => "Linnaeus",
                "year_described" => "1758",
                "activity_time" => "Diurne",
                "life_cycle" => "Métamorphose complète",
                "image" => "https://inaturalist-open-data.s3.amazonaws.com/photos/115666171/large.jpg"
            ],
            [
                "name_insect" => "Capricorne des maisons",
                "species" => "Hylotrupes bajulus",
                "description" => "Insecte xylophage qui s'attaque au bois des constructions.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Coleoptera",
                "family" => "Cerambycidae",
                "described_by" => "Linnaeus",
                "year_described" => "1758",
                "activity_time" => "Nocturne",
                "life_cycle" => "Métamorphose complète",
                "image" => "https://inaturalist-open-data.s3.amazonaws.com/photos/122804447/medium.jpg"
            ],
            [
                "name_insect" => "Petite tortue",
                "species" => "Aglais urticae",
                "description" => "Papillon coloré avec des motifs oranges et noirs, souvent observé près des orties.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Lepidoptera",
                "family" => "Nymphalidae",
                "described_by" => "Linnaeus",
                "year_described" => "1758",
                "activity_time" => "Diurne",
                "life_cycle" => "Métamorphose complète",
                "image" => "https://inaturalist-open-data.s3.amazonaws.com/photos/460765/medium.jpg"
            ],
            [
                "name_insect" => "Tipule potagère",
                "species" => "Tipula oleracea",
                "description" => "Insecte souvent confondu avec un moustique géant, mais inoffensif.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Diptera",
                "family" => "Tipulidae",
                "described_by" => "Linnaeus",
                "year_described" => "1758",
                "activity_time" => "Diurne",
                "life_cycle" => "Métamorphose complète",
                "image" => "https://inaturalist-open-data.s3.amazonaws.com/photos/44559297/medium.jpg"
            ],
            [
                "name_insect" => "Gendarme",
                "species" => "Pyrrhocoris apterus",
                "description" => "Insecte rouge et noir souvent visible en grand nombre sur les troncs d'arbres.",
                "kingdom" => "Animalia",
                "phylum" => "Arthropoda",
                "class" => "Insecta",
                "order_insect" => "Hemiptera",
                "family" => "Pyrrhocoridae",
                "described_by" => "Linnaeus",
                "year_described" => "1758",
                "activity_time" => "Diurne",
                "life_cycle" => "Métamorphose incomplète",
                "image" => "https://inaturalist-open-data.s3.amazonaws.com/photos/3933544/medium.jpg"
            ],
        ];

        foreach ($data as $insectData) {
            $insect = new Insect();
            $insect->setNameInsect($insectData['name_insect']);
            $insect->setSpecies($insectData['species']);
            $insect->setDescription($insectData['description']);
            $insect->setKingdom($insectData['kingdom']);
            $insect->setPhylum($insectData['phylum']);
            $insect->setClass($insectData['class']);
            $insect->setOrderInsect($insectData['order_insect']);
            $insect->setFamily($insectData['family']);
            $insect->setDescribedBy($insectData['described_by']);
            $insect->setYearDescribed($insectData['year_described']);
            $insect->setActivityTime($insectData['activity_time']);
            $insect->setLifeCycle($insectData['life_cycle']);
            $insect->setImage($insectData['image']);

            $manager->persist($insect);
        }

        $manager->flush();
    }
}
