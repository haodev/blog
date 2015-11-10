<?php

namespace Api\Bundle\ApiBundle\Controller;

use FOS\RestBundle\FOSRestBundle;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Translatable\Fixture\Document\Article;

/**
 * @RouteResource("Article")
 */
class ArticleController extends FOSRestController
{
    /**
     * @Get("/articles")
     *
     * @Rest\View
     *
     * @return array
     */
    public function cgetAction()
    {
        $articles = $this->get('doctrine_mongodb')->getRepository('ApiBundle:Article')->findAll();

        return $articles;

    }

    /**
     * @GET("/articles/{id}")
     *
     * @Rest\View
     *
     * @param $id
     */
    public function getAction($id)
    {
        $article = $this->get('doctrine_mongodb')->getRepository('ApiBundle:Article')->findById($id);

        if (empty($article)) {
            throw new NotFoundHttpException();
        }

        return $article[0];

    }


    /**
     * @POST("/articles")
     *
     * @return void
     */
    public function postAction()
    {
        $article = new Article();

    }


    /**
     * @DELETE("/articles/{id}")
     *
     * @return void
     */
    public function deleteAction()
    {

    }
}
