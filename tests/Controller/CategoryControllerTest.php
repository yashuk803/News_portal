<?php


namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategoryControllerTest extends WebTestCase
{

    public function testCategory()
    {
        $client = static::createClient();

        $client->request('GET', '/category/it');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', '/category/dfgdf');
        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }
}
