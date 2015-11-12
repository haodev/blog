<?php

namespace Api\Bundle\ApiBundle\Tests\Controller;

use Api\Bundle\ApiBundle\Tests\ODMFixtureTestCase;

class ArticleControllerTest extends ODMFixtureTestCase
{

    private $dmdb;

    private $client;

    public function setUp()
    {
        parent::setUp();
        $this->dmdb = static::$dm;
        $this->client = static::createClient();
        $this->loadFixtures(true);

    }


    public function testListArticles()
    {
        $this->client->request('GET', '/api/articles');
        $response = $this->client->getResponse();
        $content = $response->getContent();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty(json_decode($content));


    }


    public function testGetActionThrowsExceptionNotFound()
    {
        $this->client->request('GET', '/api/articles/toto');
        $response = $this->client->getResponse();

        $this->assertEquals(404, $response->getStatusCode());

    }


    public function testGetArticle()
    {
        $results = $this->dmdb->getRepository('ApiBundle:Article')->findAll();

        $articleTest = $results[0];

        $this->client->request('GET', '/api/articles/' . $articleTest->getId());
        $response = $this->client->getResponse();
        $resContent = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($articleTest->getId(), $resContent->id);
        $this->assertEquals($articleTest->getTitle(), $resContent->title);
        $this->assertEquals($articleTest->getLeading(), $resContent->leading);
        $this->assertEquals($articleTest->getBody(), $resContent->body);
        $this->assertEquals($articleTest->getCreatedAt(), new \DateTime($resContent->created_at));
        $this->assertEquals($articleTest->getCreatedBy(), $resContent->created_by);

    }


    public function testDeleteArticleThowsExceptionNotFound()
    {
        $this->client->request('DELETE', '/api/articles/toto');
        $response = $this->client->getResponse();

        $this->assertEquals(404, $response->getStatusCode());

    }


    public function testDeleteArticle()
    {
        $results = $this->dmdb->getRepository('ApiBundle:Article')->findAll();

        $articleToDelete = $results[0];

        $this->client->request('DELETE', '/api/articles/' . $articleToDelete->getId());

        $response = $this->client->getResponse();
        $this->assertEquals(204, $response->getStatusCode());

    }
}
