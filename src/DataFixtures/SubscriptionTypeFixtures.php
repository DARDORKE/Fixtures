<?php

namespace App\DataFixtures;

use App\Entity\SubscriptionType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SubscriptionTypeFixtures extends Fixture
{
    const SUBSCRIPTIONTYPES = [
        'Abonné' => 'subscriber',
        'Essai' => 'trial',
        'Premium' => 'premium',
        'Gratuit' => 'free',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::SUBSCRIPTIONTYPES as $subscriptionTypeName => $subscriptionTypeIdentifier){
            $subscriptionType = new SubscriptionType();
            $subscriptionType->setName($subscriptionTypeName);
            $subscriptionType->setIdentifier($subscriptionTypeIdentifier);
            $manager->persist($subscriptionType);
            $this->addReference($subscriptionTypeName, $subscriptionType);
        }

        $manager->flush();
    }
}
