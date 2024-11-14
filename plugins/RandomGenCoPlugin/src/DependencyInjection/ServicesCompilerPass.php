<?php

declare(strict_types=1);

namespace XellaTech\RandomGenCoPlugin\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use XellaTech\RandomGenCoPlugin\Provider\CompositeGeneratorCollectionInterface;
use XellaTech\RandomGenCoPlugin\Provider\RandomConverterProviderInterface;

class ServicesCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $this->registerGenerators($container);
        $this->registerConverters($container);
    }

    private function registerGenerators(ContainerBuilder $container): void
    {
        if (!$container->has(CompositeGeneratorCollectionInterface::class)) {
            return;
        }

        $builderDefinition = $container->findDefinition(CompositeGeneratorCollectionInterface::class);
        $taggedGenerators = $container->findTaggedServiceIds('xella_tech.generator');

        foreach ($taggedGenerators as $id => $tags) {
            $builderDefinition->addMethodCall('addGenerator', [new Reference($id)]);
        }
    }

    private function registerConverters(ContainerBuilder $container): void
    {
        if (!$container->has(RandomConverterProviderInterface::class)) {
            return;
        }

        $builderDefinition = $container->findDefinition(RandomConverterProviderInterface::class);
        $taggedConverters = $container->findTaggedServiceIds('xella_tech.converter');

        foreach ($taggedConverters as $id => $tags) {
            $builderDefinition->addMethodCall('addConverter', [new Reference($id)]);
        }
    }
}
