<?php
namespace Axstrad\Bundle\UseCaseTestBundle\Tests\MultiUseCase;

use Axstrad\Bundle\UseCaseTestBundle\Test\MultiUseCaseTest;

/**
 * @group functional
 */
abstract class UseCaseTest extends MultiUseCaseTest
{
    public function testIndexAction()
    {
        $client = self::createClient();

        $crawler = $client->request('GET', '/hello/Fabien');

        $this->assertTrue($crawler->filter('html:contains("Hello Fabien")')->count() > 0);
    }
}
