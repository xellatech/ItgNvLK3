<?php

declare(strict_types=1);

namespace XellaTech\RandomGenCoPlugin\Provider;

use XellaTech\RandomGenCoPlugin\Generator\GeneratorInterface;

interface CompositeGeneratorCollectionInterface
{
    public function addGenerator(GeneratorInterface $generator): void;

    /**
     * @return array|GeneratorInterface[]
     */
    public function getGenerators(): array;
}
