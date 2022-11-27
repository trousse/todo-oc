<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
use App\Tests\Core\MainTestCase;

class SecurityControllerTest extends MainTestCase
{
    public function testLogin(): void
    {
        $crawler = $this->client->request('GET', '/login');

        $this->assertResponseIsSuccessful();
        $form = $crawler->selectButton('Sign in')->form();
        $form['username'] = 'thomas';
        $form['password'] = 'dev';
        $this->client->submit($form);
        $crawler = $this->client->followRedirect();
        $this->assertResponseIsSuccessful();
        $this->assertSame(true,$this->containerTest->get('security.authorization_checker')->isGranted('ROLE_ADMIN'));

    }

    public function testUserCreate(): void{
        $crawler = $this->client->request('GET', '/users/create');

        $this->assertResponseStatusCodeSame('302');
        $userRepository = static::$container->get(UserRepository::class);
        $user = $userRepository->findOneBy(['username' => 'thomas']);

        $this->client->loginUser($user);
        $crawler = $this->client->request('GET', '/users/create');
        $form = $crawler->selectButton('Ajouter')->form();
        $form['user[username]'] = 'Farid';
        $form['user[password][first]'] = 'mdpmdp';
        $form['user[password][second]'] = "mdpmdp";
        $form['user[email]'] = "email@email.email";
        $this->client->submit($form);

        $this->client->request('GET', '/logout');
        $user = $userRepository->findOneBy(['username' => 'Farid']);

        $this->client->loginUser($user);
        $crawler = $this->client->followRedirect();

        $this->assertResponseIsSuccessful();
    }
}
