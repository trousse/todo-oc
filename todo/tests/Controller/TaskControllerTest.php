<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
use App\Tests\Core\MainTestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskControllerTest extends MainTestCase
{

    public function testList(): void
    {
        $crawler = $this->client->request('GET', '/tasks');

        $this->assertResponseIsSuccessful();
        $this->assertSame(3, $crawler->filter('.thumbnail')->count());
        $this->assertSame(1,$crawler->filter('.thumbnail:contains("thomas")')->count());

        $this->assertSelectorTextContains('a.btn-info', 'Créer une tâche');
    }

    public function testCreate(): void
    {
        $crawler = $this->client->request('GET', '/tasks/create');

        $this->assertResponseStatusCodeSame('302');
        $userRepository = static::$container->get(UserRepository::class);
        $user = $userRepository->findOneBy(['username' => 'thomas']);

        $this->client->loginUser($user);
        $crawler = $this->client->request('GET', '/tasks/create');
        $form = $crawler->selectButton('Ajouter')->form();
        $form['task[title]'] = 'title test';
        $form['task[content]'] = 'content test';
        $this->client->submit($form);
        $crawler = $this->client->followRedirect();
        $this->assertSelectorTextContains('div.alert.alert-success','La tâche a été bien été ajoutée.');
        $this->assertSelectorTextContains('','La tâche a été bien été ajoutée.');
        $this->assertSame(2,$crawler->filter('.thumbnail:contains("thomas")')->count());
        $link = $crawler->selectLink('title test')->link();
        $crawler = $this->client->click($link);


        $form = $crawler->selectButton('Modifier')->form();
        $form['task[title]'] = 'title test modifier';
        $form['task[content]'] = 'content test';
        $this->client->submit($form);
        $crawler = $this->client->followRedirect();
        $this->assertSame(1,$crawler->filter('.thumbnail:contains("title test modifier")')->count());
    }
}
