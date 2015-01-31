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
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Axstrad\Bundle\UseCaseTestBundle\Kernel\AbstractKernel
 */
abstract class AbstractKernel extends BaseKernel
{
    /**
     * @var null|string The path to the test's temp dir. A unique dir to this
     *      use case.
     */
    private $testTempDir = null;

    /**
     * The class options passed during class construction.
     *
     * @var array
     */
    protected $options = array();

    public function getUseCase()
    {
        return $this->options['use_case'];
    }


    /**
     * Class constructor
     *
     * @param string $environment The app's run environment
     * @param boolean $debug Should the app run in debug mode
     * @param array $options Options for the Kernel. Allowed options are:
     *     - use_case : The current use case
     *     - root_dir : The app's root directory
     *
     * @uses configureOptions To configure an {@link
     *       http://symfony.com/doc/current/components/options_resolver.html
     *       OptionsResolver} to resolve $options
     * @uses setResolvedOptions To set the options after they've been resolved.
     */
    public function __construct($environment, $debug, array $options)
    {
        $resolver = new OptionsResolver;
        static::configureOptions($resolver);
        $this->setResolvedOptions(
            $resolver->resolve($options)
        );

        parent::__construct($environment, $debug);
    }

    /**
     * Configures $resolver for the $options passed to the {@see __construct
     * constructor}.
     */
    public static function configureOptions(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setRequired(array(
                'use_case',
                'tmp_dir',
            ))
            ->setDefaults(array(
                'use_case' => 'default',
                'tmp_dir' => sys_get_temp_dir(),
            ))
            ->setOptional(array(
                'root_dir'
            ))
            // Not Symfony 2.3 compatable
            //
            // ->setAllowedValues(array(
            //     'root_dir' => function ($value) {
            //         return empty($value) || is_dir($value);
            //     }
            // ))
        ;
    }

    protected function setResolvedOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     */
    public function getRootDir()
    {
        if (null === $this->rootDir) {
            if (!empty($this->options['root_dir'])) {
                $this->rootDir = $this->options['root_dir'];
            }
            else {
                $this->rootDir = MultiUseCaseTest::getAbsoluteUseCasesDir().
                    DIRECTORY_SEPARATOR.
                    $this->options['use_case']
                ;
            }
        }
        return $this->rootDir;
    }

    /**
     */
    public function registerBundles()
    {
        return include $this->rootDir.DIRECTORY_SEPARATOR.'bundles.php';
    }

    /**
     * Register container configuration
     *
     * @param LoaderInterface $loader Loader
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->rootDir.DIRECTORY_SEPARATOR.'config.yml');
    }

    public function getTestTempDir()
    {
        if ($this->testTempDir === null) {
            $this->testTempDir = implode(DIRECTORY_SEPARATOR, array(
                $this->options['tmp_dir'],
                self::VERSION,
                'AxstradUseCaseTestBundleCache',
                $this->options['use_case'].'-'.$this->getEnvironment(),
            ));
        }

        return $this->testTempDir;
    }

    /**
     * Return Cache dir
     *
     * @return string
     * @uses getTestTempDir
     */
    public function getCacheDir()
    {
        return $this->getTestTempDir().DIRECTORY_SEPARATOR.'Cache';
    }

    /**
     * Return log dir
     *
     * @return string
     * @uses getTestTempDir
     */
    public function getLogDir()
    {
        return $this->getTestTempDir().DIRECTORY_SEPARATOR.'Log';
    }
}
