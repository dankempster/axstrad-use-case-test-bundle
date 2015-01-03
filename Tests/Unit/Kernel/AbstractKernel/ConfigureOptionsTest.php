<?php
namespace Axstrad\Bundle\UseCaseTestBundle\Tests\Unit\Kernel\AbstractKernel;

use Axstrad\Bundle\UseCaseTestBundle\Kernel\AbstractKernel;

/**
 * @group unit
 * @covers Axstrad\Bundle\UseCaseTestBundle\Kernel\AbstractKernel::configureOptions
 */
class ConfigureOptionsTest extends \PHPUnit_Framework_TestCase
{
    protected $mockResolver;

    public function setUp()
    {
        $this->mockResolver = $this->getMockForAbstractClass(
            'Symfony\Component\OptionsResolver\OptionsResolverInterface'
        );
        $this->mockResolver
            ->expects($this->any())
            ->method('setRequired')
            ->will($this->returnValue($this->mockResolver))
        ;
        $this->mockResolver
            ->expects($this->any())
            ->method('setDefaults')
            ->will($this->returnValue($this->mockResolver))
        ;
        $this->mockResolver
            ->expects($this->any())
            ->method('setOptional')
            ->will($this->returnValue($this->mockResolver))
        ;
        $this->mockResolver
            ->expects($this->any())
            ->method('setAllowedValues')
            ->will($this->returnValue($this->mockResolver))
        ;
    }

    public function testUseCaseOptionsIsRequired()
    {
        $this->mockResolver
            ->expects($this->once())
            ->method('setRequired')
            ->with($this->callback(function($subject) {
                return in_array('use_case', $subject);
            }))
        ;

        AbstractKernel::configureOptions($this->mockResolver);
    }

    public function testUseCaseHasDefaultSet()
    {
        $this->mockResolver
            ->expects($this->once())
            ->method('setDefaults')
            ->with($this->callback(function($subject) {
                return isset($subject['use_case']) &&
                    $subject['use_case'] === 'default'
                ;
            }))
        ;

        AbstractKernel::configureOptions($this->mockResolver);
    }

    public function testRootDirIsOptional()
    {
        $this->mockResolver
            ->expects($this->once())
            ->method('setOptional')
            ->with($this->callback(function($subject) {
                return in_array('root_dir', $subject);
            }))
        ;

        AbstractKernel::configureOptions($this->mockResolver);
    }
}
