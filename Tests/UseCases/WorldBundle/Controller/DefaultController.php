<?php

namespace Axstrad\Bundle\UseCaseTestBundle\Tests\UseCases\WorldBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AxstradUseCaseTestBundleWorldBundle:Default:index.html.twig');
    }
}
