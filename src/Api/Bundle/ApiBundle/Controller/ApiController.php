<?php

namespace Api\Bundle\ApiBundle\Controller;

use FOS\RestBundle\FOSRestBundle;
use FOS\RestBundle\Controller\FOSRestController;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use Translatable\Fixture\Document\Article;

class ApiController extends FOSRestBundle
{
    /**
     * @GET("/articles")
     * @GET("/articles/{id}")
     *
     * @param $id
     */
    public function getAction($id)
    {

        $articles = array();
        if($id) {
            $articles = $this->get('doctrine_mongodb')->getRepository('ApiBundle:Article')->findById($id);
        } else {
            $articles = $this->get('doctrine_mongodb')->getRepository('ApiBundle:Article')->find();
        }

        return ['articles' => $articles];

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
