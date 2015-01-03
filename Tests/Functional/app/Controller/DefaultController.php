<?php

namespace Axstrad\Bundle\UseCaseTestBundle\Tests\Functional\app\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AxstradUseCaseTestBundleSimpleUseCaseBundle:Default:index.html.twig',
            array('name' => $name)
        );
    }
}
