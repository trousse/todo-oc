<?php

namespace App\DataFixtures;

use App\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\UserFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TaskFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $task = new Task();
        $task->setTitle("Toto");
        $task->setCreatedAt(new \DateTime('now'));
        $task->setContent("Toto est gentil");


        $manager->persist($task);

        $manager->flush();

        $task->setUser($this->getReference(UserFixtures::USER_REF));
    }


    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
