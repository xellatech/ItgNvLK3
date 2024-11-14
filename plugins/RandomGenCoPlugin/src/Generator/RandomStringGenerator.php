<?php

declare(strict_types=1);

namespace XellaTech\RandomGenCoPlugin\Generator;

use XellaTech\RandomGenCoPlugin\Factory\GeneratorResultFactoryInterface;
use XellaTech\RandomGenCoPlugin\Model\GeneratorResultInterface;

class RandomStringGenerator implements GeneratorInterface
{
    public function __construct(
        private GeneratorResultFactoryInterface $generatorResultFactory,
        private string $pattern,
        private int $length,
    ) {
    }

    public function generate(): GeneratorResultInterface
    {
        $chsLength = strlen($this->pattern);
        $result = '';

        for ($i = 0; $i < $this->length; ++$i) {
            $result .= $this->pattern[random_int(0, $chsLength - 1)];
        }

        return $this->generatorResultFactory->createForResultIem($result);
    }
}
