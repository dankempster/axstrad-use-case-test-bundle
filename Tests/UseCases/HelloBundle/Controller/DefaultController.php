<?php

namespace Axstrad\Bundle\UseCaseTestBundle\Tests\UseCases\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AxstradUseCaseTestBundleHelloBundle:Default:index.html.twig', array('name' => $name));
    }
}
