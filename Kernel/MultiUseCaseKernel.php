<?php
/**
 * This file is part of the Axstrad Library
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

namespace Axstrad\Bundle\UseCaseTestBundle\Kernel;

use Axstrad\Bundle\UseCaseTestBundle\Test\MultiUseCaseTest;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Axstrad\Bundle\UseCaseTestBundle\Kernel\MultiUseCaseKernel
 */
final class MultiUseCaseKernel extends AbstractKernel
{
    /**
     */
    public static function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setRequired(array('root_dir'));
        $resolver->setDefaults(array(
            'root_dir' => function(Options $options) {
                return MultiUseCaseTest::getAbsoluteUseCasesDir().
                    DIRECTORY_SEPARATOR.
                    $options['use_case']
                ;
            },
        ));
    }
}
