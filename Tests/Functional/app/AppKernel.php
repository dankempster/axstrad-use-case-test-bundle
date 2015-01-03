<?php
namespace Axstrad\Bundle\UseCaseTestBundle\Tests\Functional\app;

use Axstrad\Bundle\UseCaseTestBundle\Kernel\AbstractKernel;

/**
 * Axstrad\Bundle\UseCaseTestBundle\Tests\Functional\app\AppKernel
 */
class AppKernel extends AbstractKernel
{
    public function registerBundles()
    {
        return array(
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Symfony\Bundle\TwigBundle\TwigBundle(),
            new AxstradUseCaseTestBundleSimpleUseCaseBundle(),
        );
    }
}
