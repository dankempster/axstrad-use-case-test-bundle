<?php
namespace Axstrad\Bundle\UseCaseTestBundle\Tests\UseCases\Kernels;

use Axstrad\Bundle\UseCaseTestBundle\Kernel\AbstractKernel;

/**
 * Axstrad\Bundle\UseCaseTestBundle\Tests\UseCases\Kernels\CustomBundlesKernel
 *
 * This kernel represents the ability to explicitly definine the bundles instead
 * of using the bundles.php file.
 */
class CustomBundlesKernel extends AbstractKernel
{
    public function registerBundles()
    {
        return array(
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Symfony\Bundle\TwigBundle\TwigBundle(),
            new \Axstrad\Bundle\UseCaseTestBundle\Tests\UseCases\HelloBundle\AxstradUseCaseTestBundleHelloBundle(),
        );
    }
}
