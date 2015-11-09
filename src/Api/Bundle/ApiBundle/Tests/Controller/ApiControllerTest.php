<?php

namespace Api\Bundle\ApiBundle\Tests\Controller;

use Api\Bundle\ApiBundle\Controller\ApiController;
use Api\Bundle\ApiBundle\Document\Article;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase
{
    public function testList()
    {

        $articleTest = new Article();

        $apiController = new ApiController();
        $res = $apiController->listAction();

        $this->assertInternalType('array', $res);
        $this->assertCount(1, $res);

    }
}
