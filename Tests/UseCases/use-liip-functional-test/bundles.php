<?php

$baseBundles = include __DIR__.'/../base-bundles.php';

return array_merge($baseBundles, array(
    new Symfony\Bundle\TwigBundle\TwigBundle(),

    // Doctrine bundles
    new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
    new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),

    // Helper bundles - help write test code quicker
    new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

    // LiipFunctionalTestBundle
    new Liip\FunctionalTestBundle\LiipFunctionalTestBundle(),

    // A mock "under test" bundle
    new Axstrad\Bundle\UseCaseTestBundle\Tests\UseCases\PageBundle\AxstradUseCaseTestBundlePageBundle(),
));
