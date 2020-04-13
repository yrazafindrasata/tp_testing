<?php


namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactTest extends WebTestCase
{
    public function testShowList()
    {
        $client = static:: createClient();
        $client->followRedirects(true);
        $crawler = $client -> request('GET','/contact');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Contact index');
    }

    public function  testNewOk()
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $crawler = $client->request('GET','/contact/new');
        $this->assertResponseIsSuccessful();
        $client->submitForm('Save',[
            'contact[firstname]' => 'pierre',
            'contact[lastname]' => 'louis',
            'contact[email]' => 'pierre@mail.com',
            'contact[phone_number]' => '0656432345'
        ]);
        $this->assertSelectorTextContains('h1','Contact index');
    }

    public function  testNewNotOk()
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $crawler = $client->request('GET','/contact/new');
        $this->assertResponseIsSuccessful();
        $client->submitForm('Save',[
            'contact[firstname]' => 'pierre',
            'contact[lastname]' => 'louis',
            'contact[email]' => 'louis@mail.com',
            'contact[phone_number]' => '06564323er'
        ]);
        $this->assertSelectorTextContains('ul li','This value should be of type digit.');
    }
    
        public function  testEditNotOk()
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $crawler = $client->request('GET','/contact/1/edit');
        $this->assertResponseIsSuccessful();
        $client->submitForm('Update',[
            'contact[phone_number]' => '06564323er'
        ]);
        $this->assertSelectorTextContains('ul li','This value should be of type digit.');
    }

    public function  testEditOk()
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $crawler = $client->request('GET','/contact/1/edit');
        $this->assertResponseIsSuccessful();
        $client->submitForm('Update',[
            'contact[phone_number]' => '0656432367'
        ]);
        $this->assertSelectorTextContains('h1','Contact index');
    }
}
