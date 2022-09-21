<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    const CATEGORIES = [
        'Légume',
        'Épice',
        'Céréale',
        'Condiment',
        'Produit pâtissier',
        'Produit laitier',
    ];

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        foreach (self::CATEGORIES as $categoryName){
            $category = new Category();
            $category->setTitle($categoryName);
            $this->addReference($categoryName, $category);
            $manager->persist($category);
        }

        $manager->flush();
    }
}
