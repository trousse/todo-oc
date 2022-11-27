<?php

namespace App\DataFixtures;

use App\DataFixtures\UserFixtures;
use App\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TaskFixtures extends Fixture implements DependentFixtureInterface
{
    private function getTasks()
    {
        return [
            [
                "id" => 1,
                "created_at" => "2022-10-01 11:47:40",
                "title" => "add codacy on the project",
                "content" => "document 1",
                "is_done" => 0,
                "user" => "thomas"
            ],
            [
                "id" => 2,
                "created_at" => "2022-10-01 11:47:40",
                "title" => "create issues test",
                "content" => "document 2",
                "is_done" => 1,
                "user" => "david"
            ],
            [
                "id" => 3,
                "created_at" => "2022-10-01 11:47:40",
                "title" => "writing documentation",
                "content" => "document ",
                "is_done" => 1,
                "user" => "ayoub"
            ],
            [
                "id" => 4,
                "created_at" => "2022-01-01 11:47:40",
                "title" => "create git",
                "content" => "create the git repo for the project",
                "is_done" => 1
            ]
        ];
    }

    public function load(ObjectManager $manager): void
    {
        $tasks = $this->getTasks();
        foreach ($tasks as $task){
            $newTask = new Task();
            if(isset($task['user'])) $newTask->setUser($this->getReference(UserFixtures::USER_REF.$task['user']));
            $newTask->setContent($task['content']);
            $newTask->setCreatedAt( new \Datetime($task['created_at']));
            $newTask->setTitle($task['title']);

            $manager->persist($newTask);
        }

        $manager->flush();

    }


    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
