<?php
namespace Axstrad\Bundle\UseCaseTestBundle\Tests\MultiUseCase;

/**
 * @group functional
 * @group multi-use-cases
 */
class DefaultUseCaseWithCustomBundles extends DefaultUseCaseTest
{
    /**
     */
    public static function getKernelClass()
    {
        return 'Axstrad\Bundle\UseCaseTestBundle\Tests\UseCases\Kernels\CustomBundlesKernel';
    }

    public function testKernelHasCustomBundles()
    {
        $this->assertInstanceOf(
            'Axstrad\Bundle\UseCaseTestBundle\Tests\UseCases\Kernels\CustomBundlesKernel',
            self::createKernel()
        );
    }
}
