<?php
namespace Axstrad\Bundle\UseCaseTestBundle\Tests\Unit\Kernel;

use Symfony\Component\HttpKernel\Kernel as HttpKernel;

/**
 * @group unit
 * @uses Axstrad\Bundle\UseCaseTestBundle\Kernel\AbstractKernel::__construct
 * @uses Axstrad\Bundle\UseCaseTestBundle\Kernel\AbstractKernel::configureOptions
 * @uses Axstrad\Bundle\UseCaseTestBundle\Kernel\AbstractKernel::setResolvedOptions
 * @uses Axstrad\Bundle\UseCaseTestBundle\Kernel\AbstractKernel::getRootDir
 */
class AbstractKernelConstructTest extends \PHPUnit_Framework_TestCase
{
    public function createKernel(array $options = array())
    {
        $args = array(
            'env' => isset($options['environment'])
                ? $options['environment']
                : 'test',
            'debug' => isset($options['debug'])
                ? $options['debug']
                : true,
            'options' => array_merge(
                array(
                    'root_dir' => realpath(__DIR__.'/../../UseCases/default')
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
     * @covers Axstrad\Bundle\UseCaseTestBundle\Kernel\AbstractKernel::getTestTempDir
     * @dataProvider tempDirDataProvider
     */
    public function testTempDir(array $options, $expected)
    {
        $kernel = $this->createKernel($options);

        $this->assertStringEndsWith(
            $expected,
            $kernel->getTestTempDir()
        );
    }

    public function tempDirDataProvider()
    {
        return array(
            array(
                [],
                implode(DIRECTORY_SEPARATOR, array(
                    'AxstradUseCaseTestBundleCache',
                    'default',
                    HttpKernel::VERSION,
                    'test'
                ))
            ),
            array(
                [
                    'environment' => 'test2'
                ],
                implode(DIRECTORY_SEPARATOR, array(
                    'AxstradUseCaseTestBundleCache',
                    'default',
                    HttpKernel::VERSION,
                    'test2'
                ))
            ),
            array(
                [
                    'use_case' => 'example'
                ],
                implode(DIRECTORY_SEPARATOR, array(
                    'AxstradUseCaseTestBundleCache',
                    'example',
                    HttpKernel::VERSION,
                    'test'
                ))
            ),
            array(
                [
                    'use_case' => 'example',
                    'environment' => 'test2',
                ],
                implode(DIRECTORY_SEPARATOR, array(
                    'AxstradUseCaseTestBundleCache',
                    'example',
                    HttpKernel::VERSION,
                    'test2'
                ))
            ),
        );
    }
}
