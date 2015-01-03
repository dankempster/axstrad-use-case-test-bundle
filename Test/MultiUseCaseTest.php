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

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Axstrad\Bundle\UseCaseTestBundle\Test\MultiUseCaseTest
 */
abstract class MultiUseCaseTest extends UseCaseTest
{
    /**
     * @var string The path to the use cases relative to the project's root.
     */
    public static $useCasesDir = 'Tests/UseCases';

    /**
     */
    protected static function getKernelClass()
    {
        return 'Axstrad\Bundle\UseCaseTestBundle\Kernel\MultiUseCaseKernel';
    }

    /**
     * Returns the absolure path to the UseCases.
     *
     * Appends the {@see useCaseDir use case directory} to the root of your
     * project. The project root is detected based on the {@see getPhpUnitXmlDir
     * location of PHPUnit's configuration file}.
     *
     * @return string
     * @throws InvalidPathException
     */
    public static function getAbsoluteUseCasesDir()
    {
        $path = static::getPhpUnitXmlDir() .
            DIRECTORY_SEPARATOR .
            static::$useCasesDir
        ;

        if (!is_dir($path)) {
            throw new PathDoesNotExistException(
                sprintf(
                    "The path '%s' doesn't exist.".
                    " Which was generated from your project root (%s) and the".
                    " defined use case directory (%s). See".
                    " Axstrad\Bundle\UseCaseTestBundle\Test\UseCaseTest::$useCasesDir",
                    $path,
                    static::getPhpUnitXmlDir(),
                    static::$useCasesDir
                )
            );
        }

        return $path;
    }
}
