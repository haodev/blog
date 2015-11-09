<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 09/11/15
 * Time: 15:50
 */

namespace Api\Bundle\ApiBundle\Tests\Document;


use Api\Bundle\ApiBundle\Document\Article;

class ArticleTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Tests generic getters and setters
     *
     * @return void
     */
    public function testGettersSetters()
    {

        $methodToTest = [
            'title' => 'This is a title',
            'leading' => 'This is a leading',
            'body' => 'This is a content of the article',
            'createdBy' => 'Hao',
            'createdAt' => new \DateTime()
        ];

        $articleTest = new Article();
        $articleTest->setTitle($methodToTest['title'])
            ->setLeading($methodToTest['leading'])
            ->setBody($methodToTest['body'])
            ->setCreatedBy($methodToTest['createdBy']);

        $this->assertEquals($methodToTest['title'], $articleTest->getTitle());
        $this->assertEquals($methodToTest['leading'], $articleTest->getLeading());
        $this->assertEquals($methodToTest['body'], $articleTest->getBody());
        $this->assertNull($articleTest->getSlug());
        $this->assertEquals($methodToTest['createdBy'], $articleTest->getCreatedBy());
        $this->assertEquals($methodToTest['createdAt'], $articleTest->getCreatedAt());

    }
}
