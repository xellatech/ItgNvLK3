<?php

declare(strict_types=1);

namespace XellaTech\RandomGenCoPlugin\Provider;

use XellaTech\RandomGenCoPlugin\Generator\GeneratorInterface;

class CompositeGeneratorCollection implements CompositeGeneratorCollectionInterface
{
    /**
     * @var array|GeneratorInterface[]
     */
    private array $generators = [];

    public function addGenerator(GeneratorInterface $generator): void
    {
        $this->generators[] = $generator;
    }

    /**
     * @return array|GeneratorInterface[]
     */
    public function getGenerators(): array
    {
        return $this->generators;
    }
}
