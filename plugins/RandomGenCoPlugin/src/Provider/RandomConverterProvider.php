<?php

declare(strict_types=1);

namespace XellaTech\RandomGenCoPlugin\Provider;

use XellaTech\RandomGenCoPlugin\Converter\ConverterInterface;

class RandomConverterProvider implements RandomConverterProviderInterface
{
    /**
     * @var array|ConverterInterface[]
     */
    private array $converters = [];

    public function addConverter(ConverterInterface $converter): void
    {
        $this->converters[] = $converter;
    }

    public function getRandomConverter(): ConverterInterface
    {
        $converter = $this->converters[array_rand($this->converters)] ?? null;

        if (null === $converter) {
            throw new \Exception('No converters found!');
        }

        return $converter;
    }
}
