<?php

namespace Front\Bundle\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FrontBundle:Default:index.html.twig', array('name' => $name));
    }
}
