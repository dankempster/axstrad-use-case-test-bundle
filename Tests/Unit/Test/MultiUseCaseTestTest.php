<?php
namespace Axstrad\Bundle\UseCaseTestBundle\Tests\Unit\Test;

use Axstrad\Bundle\UseCaseTestBundle\Test\MultiUseCaseTest;

/**
 */
class MultiUseCaseTestTest extends \PHPUnit_Framework_TestCase
{
    private $originalUseCasesDir = null;

    public function setUp()
    {
        $this->originalUseCasesDir = MultiUseCaseTest::$useCasesDir;
    }

    public function tearDown()
    {
        MultiUseCaseTest::$useCasesDir = $this->originalUseCasesDir;
    }

    public function testCanGetAbsolutePathToUseCaseDir()
    {
        $this->assertEquals(
            realpath(__DIR__.'/../../UseCases'),
            MultiUseCaseTest::getAbsoluteUseCasesDir()
        );
    }

    /**
     * @expectedException Axstrad\Bundle\UseCaseTestBundle\Exception\PathDoesNotExistException
     */
    public function testExceptionThrownWhenInvalidUseCaseDir()
    {
        MultiUseCaseTest::$useCasesDir = 'i/do/not/exist';
        MultiUseCaseTest::getAbsoluteUseCasesDir();
    }
}
