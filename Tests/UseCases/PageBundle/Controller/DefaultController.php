<?php

namespace Axstrad\Bundle\UseCaseTestBundle\Tests\UseCases\PageBundle\Controller;

use Axstrad\Bundle\UseCaseTestBundle\Tests\UseCases\PageBundle\Entity\Page;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @ParamConverter("page")
     */
    public function indexAction(Page $page)
    {
        return $this->render(
            'AxstradUseCaseTestBundlePageBundle:Default:index.html.twig',
            array(
                'page' => $page,
            )
        );
    }
}
