<?php

namespace BBIT\AsyncDispatcherBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BBITAsyncDispatcherBundle:Default:index.html.twig', array('name' => $name));
    }
}
