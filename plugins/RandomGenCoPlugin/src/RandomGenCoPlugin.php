<?php

declare(strict_types=1);

namespace XellaTech\RandomGenCoPlugin;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use XellaTech\RandomGenCoPlugin\DependencyInjection\RandomGenCoPluginExtension;
use XellaTech\RandomGenCoPlugin\DependencyInjection\ServicesCompilerPass;

class RandomGenCoPlugin extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new ServicesCompilerPass());

        parent::build($container);
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        return new RandomGenCoPluginExtension();
    }
}
