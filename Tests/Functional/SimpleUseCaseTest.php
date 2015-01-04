<?php
namespace Axstrad\Bundle\UseCaseTestBundle\Tests\Functional;

use Axstrad\Bundle\UseCaseTestBundle\Test\SimpleUseCaseTest as BaseTestCase;

/**
 * @group functional
 */
class SimpleUseCaseTest extends BaseTestCase
{
    public function testIndexAction()
    {
        $client = self::createClient();

        $crawler = $client->request('GET', '/hello/Fabien');

        $this->assertTrue($crawler->filter('html:contains("Hello Fabien")')->count() > 0);
    }
}
