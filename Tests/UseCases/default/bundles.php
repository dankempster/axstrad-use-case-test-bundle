<?php

$baseBundles = include __DIR__.'/../base-bundles.php';

return array_merge($baseBundles, array(
    new Symfony\Bundle\TwigBundle\TwigBundle(),
    new Axstrad\Bundle\UseCaseTestBundle\Tests\UseCases\HelloBundle\AxstradUseCaseTestBundleHelloBundle(),
));
