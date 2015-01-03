<?php
namespace Axstrad\Bundle\UseCaseTestBundle\Tests\MultiUseCase;

use Axstrad\Bundle\UseCaseTestBundle\Test\MultiUseCaseTest;

/**
 * @group functional
 */
abstract class UseCaseTest extends MultiUseCaseTest
{
    /**
     * @var string The use case to use for this test.
     */
    protected $useCase;

    public function testIndexAction()
    {
        $client = self::createClient(array(
            'use_case' => $this->useCase,
        ));

        $crawler = $client->request('GET', '/hello/Fabien');

        $this->assertTrue($crawler->filter('html:contains("Hello Fabien")')->count() > 0);
    }
}
