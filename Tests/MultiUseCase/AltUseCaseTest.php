<?php
namespace Axstrad\Bundle\UseCaseTestBundle\Tests\MultiUseCase;

use Axstrad\Bundle\UseCaseTestBundle\Test\MultiUseCaseTest;

/**
 * @group functional
 */
class ExampleUseCaseTest extends MultiUseCaseTest
{
    protected static $useCase = 'alt-use-case';

    protected $client;

    public function setUp()
    {
        $this->client = self::createClient();
    }

    public function testHelloUrl404s()
    {
        $this->client->request('GET', '/hello/Fabien');

        $this->assertFalse($this->client->getResponse()->isSuccessful());
    }

    public function testWorldUrlIsSuccessful()
    {
        $this->client->request('GET', '/world');

        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }
}
