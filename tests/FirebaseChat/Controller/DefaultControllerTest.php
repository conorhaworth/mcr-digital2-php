<?php
/**
 * Created by IntelliJ IDEA.
 * User: ajvwhite
 * Date: 05/11/2016
 * Time: 22:11
 */

namespace FirebaseChat\Tests\FirebaseChat\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }
}