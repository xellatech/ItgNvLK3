<?php

declare(strict_types=1);

namespace XellaTech\RandomGenCoPlugin\Generator;

use XellaTech\RandomGenCoPlugin\Factory\GeneratorResultFactoryInterface;
use XellaTech\RandomGenCoPlugin\Generator\GeneratorInterface;
use XellaTech\RandomGenCoPlugin\Model\GeneratorResultInterface;

class RandomStringListGenerator implements GeneratorInterface
{
    public function __construct(
        private GeneratorResultFactoryInterface $generatorResultFactory,
        private GeneratorInterface $randomStringGenerator,
        private int $listLength,
    ) {
    }

    public function generate(): GeneratorResultInterface
    {
        $result = [];

        for ($i = 0; $i < $this->listLength; $i++) {
            $result[] = $this->randomStringGenerator->generate()->getResult();
        }

        return $this->generatorResultFactory->createForResultList($result);
    }
}
