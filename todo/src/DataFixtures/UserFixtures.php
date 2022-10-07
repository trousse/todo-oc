<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public const USER_REF = 'user-toto';

    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    private function getUsers()
    {
    return [
        [
            "id" => 1,
            "name" => "totoo",
            "email" => "totoo@email.fr",
            "password" => "dev",
            "roles" => "ROLE_ADMIN"
        ],
        [
            "id" => 1,
            "name" => "totoo",
            "email" => "totoo@email.fr",
            "password" => "dev",
            "roles" => "ROLE_ADMIN"
        ],
        [
            "id" => 1,
            "name" => "totoo",
            "email" => "totoo@email.fr",
            "password" => "dev",
            "roles" => "ROLE_ADMIN"
        ]
    ];
    }

    public function load(ObjectManager $manager): void
    {
        $users = $this->getUsers();
        foreach ($users as $user){
            $user = new User();
            $user->setEmail("toto@toto.fr");
            $user->setUsername("toto");

            $hashedPassword = $this->passwordHasher->hashPassword($user, 'toto');

            $user->setPassword($hashedPassword);

            $this->addReference(self::USER_REF, $user);

            $manager->persist($user);
        }
        $manager->flush();
    }
}
