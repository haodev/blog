<?php

namespace Api\Bundle\ApiBundle\Tests\Controller;

use Api\Bundle\ApiBundle\Controller\ApiController;
use Api\Bundle\ApiBundle\Controller\ArticleController;
use Api\Bundle\ApiBundle\Document\Article;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArticleControllerTest extends WebTestCase
{
    public function testList()
    {

        $articleTest = new Article();

        $apiController = new ArticleController();
        $res = $apiController->cgetAction();

        $this->assertInternalType('array', $res);
        $this->assertCount(1, $res);

    }


    /**
     *
     */
    public function testGetActionThrowsExceptionNotFound()
    {
        $this->setExpectedException('NotFoundHttpException');
        $apiController = new ArticleController();
        $apiController->getAction(1);

    }
}
