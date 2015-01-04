<?php
/**
 * This file is part of the Axstrad Library.
 *
 * Copyright (c) 2015 Dan Kempster
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 */
namespace Axstrad\Bundle\UseCaseTestBundle\Test;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Axstrad\Bundle\UseCaseTestBundle\Test\UseCaseTestTrait
 */
trait UseCaseTestTrait
{
    /**
     */
    protected static function getKernelClass()
    {
        return 'Axstrad\Bundle\UseCaseTestBundle\Kernel\MultiUseCaseKernel';
    }

    /**
     * Creates a Kernel.
     *
     * Available options:
     *
     *  * environment
     *  * debug
     *  * root_dir
     *
     * @param array $options An array of options
     *
     * @return Kernel A Kernel instance
     */
    protected static function createKernel(array $options = array())
    {
        static::$class = static::getKernelClass();

        // ## Resolve the options
        $resolver = new OptionsResolver;

        // Use the Kernel's configureOptions method first
        call_user_func(static::$class.'::configureOptions', $resolver);
        // Now use out own
        static::configureKernelOptions($resolver);

        // Resikve the options and split out the Kernel only options.
        $options = $resolver->resolve($options);
        $kernelOptions = array_diff_key($options, array_flip(array('environment', 'debug')));

        // ## Create the Kernel
        return new static::$class(
            $options['environment'],
            $options['debug'],
            $kernelOptions
        );
    }

    /**
     * Define this method to configure the OptionsResolver.
     *
     * @param  OptionsResolverInterface $resolver
     * @return void
     */
    public static function configureKernelOptions(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setDefaults(array(
                'environment' => 'test',
                'debug' => true,
                'use_case' => static::$useCase,
            ))
            ->setAllowedTypes(array(
                'debug' => 'bool',
            ))
        ;
    }
}
