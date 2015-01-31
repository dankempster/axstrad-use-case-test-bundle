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
 * Axstrad\Bundle\UseCaseTestBundle\Test\UseCaseTest
 */
abstract class UseCaseTest extends WebTestCase
{
    use UseCaseTestTrait;

    /**
     * @var string The Use Case to use for this TestCase
     */
    protected static $useCase = 'default';
}
