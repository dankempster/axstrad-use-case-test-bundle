<?php
namespace Axstrad\Bundle\UseCaseTestBundle\Tests\MultiUseCase;

/**
 * @group functional
 * @group multi-use-cases
 */
class DefaultUseCaseWithCustomKernelTest extends DefaultUseCaseTest
{
    /**
     */
    public static function getKernelClass()
    {
        return 'Axstrad\Bundle\UseCaseTestBundle\Tests\UseCases\Kernels\CustomKernel';
    }

    public function testKernelIsCustom()
    {
        $this->assertInstanceOf(
            'Axstrad\Bundle\UseCaseTestBundle\Tests\UseCases\Kernels\CustomKernel',
            self::createKernel()
        );
    }
}
