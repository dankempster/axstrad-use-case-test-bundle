<?php
/**
 * This file is part of the Elcodi package.
 *
 * Copyright (c) 2014 Elcodi.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 */

namespace Axstrad\Bundle\UseCaseTestBundle\Test;

use Axstrad\Bundle\UseCaseTestBundle\Exception\BadMethodCallException;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Axstrad\Bundle\UseCaseTestBundle\Test\SimpleUseCaseTest
 */
abstract class SimpleUseCaseTest extends UseCaseTest
{
    /**
     * Returns the namespace and path to the current function tests.
     *
     * This method has to be invoked from a subclass because it uses reflection
     * on the calling class to find the test's location and namespace.
     *
     * @return array
     * @throws BadMethodCallException If invoked directly on SimpleUseCaseTest.
     */
    protected static function getTestInfo()
    {
        $class = get_called_class();
        if ($class === 'Axstrad\Bundle\UseCaseTestBundle\Test\SimpleUseCaseTest') {
            throw new BadMethodCallException(
                __METHOD__.' cannot be invoked directly, it must be invoked '.
                ' by a subclass.'
            );
        }

        $namespaceKey = '\\Tests\\Functional';
        $pathKey = str_replace('\\', DIRECTORY_SEPARATOR, $namespaceKey);

        $r = new \ReflectionClass($class);
        $namespace = explode($namespaceKey, $r->getNamespaceName());
        $path = explode($pathKey, $r->getFileName());

        return array(
            'namespace' => $namespace[0].$namespaceKey,
            'path' => $path[0].$pathKey
        );
    }

    /**
     */
    protected static function getKernelClass()
    {
        $testInfo = self::getTestInfo();

        return $testInfo['namespace'].'\app\AppKernel';
    }

    /**
     * Define this method to configure the OptionsResolver.
     *
     * @param  OptionsResolverInterface $resolver
     * @return void
     */
    public static function configureKernelOptions(OptionsResolverInterface $resolver)
    {
        parent::configureKernelOptions($resolver);

        $testInfo = self::getTestInfo();
        $resolver->setDefault('root_dir', $testInfo['path'].DIRECTORY_SEPARATOR.'app');
    }
}
