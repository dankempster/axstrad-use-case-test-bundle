<?php
namespace Axstrad\Bundle\UseCaseTestBundle\Tests\MultiUseCase;

use Axstrad\Bundle\UseCaseTestBundle\Test\MultiUseCaseTest;

/**
 * @group functional
 */
class ExampleUseCaseTest extends MultiUseCaseTest
{
    protected $client;

    public function setUp()
    {
        $this->client = self::createClient(array(
            'use_case' => 'alt-use-case',
        ));
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
