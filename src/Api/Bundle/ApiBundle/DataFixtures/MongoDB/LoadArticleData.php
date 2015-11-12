<?php

/**
 * Created by PhpStorm.
 * User: hao
 * Date: 12/11/15
 * Time: 13:59
 */

namespace Api\Bundle\ApiBundle\DataFixtures\MongoDB;

use Api\Bundle\ApiBundle\Document\Article;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadArticleData extends AbstractFixture implements OrderedFixtureInterface
{


    public function load(ObjectManager $manager)
    {
        $articleTestOne = new Article();
        $articleTestOne->setTitle('Article de test 1')
            ->setLeading('Summary')
            ->setBody('This is the content')
            ->setCreatedBy('User test 1');

        $articleTestSecond = new Article();
        $articleTestSecond->setTitle('Article de test 2')
            ->setLeading('Summary 2')
            ->setBody('This is the content 2')
            ->setCreatedBy('User test 2');


        $manager->persist($articleTestOne);
        $manager->persist($articleTestSecond);

        $manager->flush();

    }


    public function getOrder()
    {
        return 1;

    }

}