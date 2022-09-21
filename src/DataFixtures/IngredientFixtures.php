<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class IngredientFixtures extends Fixture implements DependentFixtureInterface
{
    const INGREDIENTS = [
        'Sucre' 	=> 'Épice',
        'Farine'	=> 'Céréale',
        'Sel'   	=> 'Épice',
        'Poivre'	=> 'Épice',
        'Chocolat'  => 'Produit pâtissier',
        'Tomate'	=> 'Légume',
        'Courgette' => 'Légume',
        'Crème' 	=> 'Produit laitier',
    ];

    public function load(ObjectManager $manager): void
    {

        foreach (self::INGREDIENTS as $ingredientName => $categoryName){
            $ingredient = new Ingredient();
            $ingredient->setName($ingredientName);
            $ingredient->setCategoryId($this->getReference($categoryName));
            $manager->persist($ingredient);
        }


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class
        ];
    }
}
