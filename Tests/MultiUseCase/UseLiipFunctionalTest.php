<?php
namespace Axstrad\Bundle\UseCaseTestBundle\Tests\MultiUseCase;

use Axstrad\Bundle\UseCaseTestBundle\Test\UseCaseTestTrait;
use Liip\FunctionalTestBundle\Test\WebTestCase;

/**
 * Axstrad\Bundle\UseCaseTestBundle\Tests\MultiUseCase\UseLiipFunctionalTest
 *
 * @functional
 */
class UseLiipFunctionalTest extends WebTestCase
{
    use UseCaseTestTrait;

    protected static $useCase = 'use-liip-functional-test';

    public function testKernelIsUseCaseCompatible()
    {
        $this->assertInstanceOf(
            'Axstrad\Bundle\UseCaseTestBundle\Kernel\MultiUseCaseKernel',
            self::createKernel()
        );
    }

    /**
     * @depends testKernelIsUseCaseCompatible
     */
    public function testUseCaseIsSet()
    {
        $kernel = static::createKernel();

        $this->assertEquals(
            'use-liip-functional-test',
            $kernel->getUseCase()
        );
    }

    /**
     * @depends testUseCaseIsSet
     */
    public function testPageLoads()
    {
        $this->loadFixtures(array(
            'Axstrad\Bundle\UseCaseTestBundle\Tests\UseCases\PageBundle\DataFixtures\ORM\LoadPageData',
        ));

        $client = static::createClient();

        $client->request('GET', '/page/1');
        $this->assertTrue(
            $client->getResponse()->isSuccessful()
        );
    }
}
