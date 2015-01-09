<?php
namespace Axstrad\Bundle\UseCaseTestBundle\Tests\Unit\Kernel;

/**
 * @group unit
 * @uses Axstrad\Bundle\UseCaseTestBundle\Kernel\AbstractKernel::__construct
 * @uses Axstrad\Bundle\UseCaseTestBundle\Kernel\AbstractKernel::configureOptions
 * @uses Axstrad\Bundle\UseCaseTestBundle\Kernel\AbstractKernel::setResolvedOptions
 * @uses Axstrad\Bundle\UseCaseTestBundle\Kernel\AbstractKernel::getRootDir
 */
class AbstractKernelTest extends \PHPUnit_Framework_TestCase
{
    public function createKernel(array $options = array())
    {
        !isset($options['use_case']) && $options['use_case'] = 'default';

        $args = array(
            'env' => isset($options['environment'])
                ? $options['environment']
                : 'test',
            'debug' => isset($options['debug'])
                ? $options['debug']
                : true,
            'options' => array_merge(
                array(
                    'root_dir' => realpath(__DIR__.'/../../UseCases/'.$options['use_case'])
                ),
                $options
            ),
        );
        unset($args['options']['environment'], $args['options']['debug']);

        return $this->getMockForAbstractClass(
            'Axstrad\Bundle\UseCaseTestBundle\Kernel\AbstractKernel',
            $args
        );
    }

    /**
     * @covers Axstrad\Bundle\UseCaseTestBundle\Kernel\AbstractKernel::registerContainerConfiguration
     * @dataProvider registerContainerConfigurationDataProvider
     */
    public function testRegisterContainerConfiguration(array $kernelOptions, $expected)
    {
        $mockLoader = $this->getMockForAbstractClass('Symfony\Component\Config\Loader\LoaderInterface');
        $mockLoader->expects($this->once())
            ->method('load')
            ->with($this->equalTo($expected))
        ;

        $this->createKernel($kernelOptions)
            ->registerContainerConfiguration($mockLoader)
        ;
    }

    public function registerContainerConfigurationDataProvider()
    {
        return array(
            [ [], realpath(__DIR__.'/../../UseCases/default/config.yml') ],

            [
                ["use_case" => "default"],
                realpath(__DIR__.'/../../UseCases/default/config.yml'),
            ],

            [
                ["use_case" => "alt-use-case"],
                realpath(__DIR__.'/../../UseCases/alt-use-case/config.yml'),
            ],
        );
    }
}
