<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class IngredientFixtures extends Fixture
{
    const INGREDIENTS = ['Sucre', 'Farine', 'Oeuf', 'Sel', 'Poivre', 'Chocolat', 'Tomate', 'Courgette', 'Crème'];

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        foreach (self::INGREDIENTS as $ingredientName){
            $ingredient = new Ingredient();
            $ingredient->setName($ingredientName);
            $manager->persist($ingredient);
        }


        $manager->flush();
    }
}
