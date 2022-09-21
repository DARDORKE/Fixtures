<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 1000; $i++){
            $user = new User();
            $faker = Factory::create();
            $user->setName($faker->firstName);
            $user->setAddress($faker->address);
            $randomSubscriptionType = array_rand(SubscriptionTypeFixtures::SUBSCRIPTIONTYPES, 1);
            $user->setSubscriptionType($this->getReference($randomSubscriptionType));
            $manager->persist($user);
        }

        $manager->flush();

    }

    public function getDependencies()
    {
        return [
            SubscriptionTypeFixtures::class
        ];
    }
}
