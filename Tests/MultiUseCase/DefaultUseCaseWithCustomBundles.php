<?php
namespace Axstrad\Bundle\UseCaseTestBundle\Tests\MultiUseCase;

/**
 * @group functional
 */
class DefaultUseCaseWithCustomBundles extends DefaultUseCaseTest
{
    protected $useCase = 'default';

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
