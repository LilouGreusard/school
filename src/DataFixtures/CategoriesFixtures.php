<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Categories;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoriesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 0; $i <= 5; $i++){
            $category = new Categories();
            
            $category -> setName($faker -> sentence(2));

            $category -> setSlug($faker -> slug());

            $category -> setPicture('01.png');

            $manager -> persist($category);
        }

        $manager->flush();
    }
}
