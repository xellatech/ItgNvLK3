<?php

declare(strict_types=1);

namespace XellaTech\RandomGenCoPlugin\Converter;

use XellaTech\RandomGenCoPlugin\Factory\ConverterResultFactoryInterface;
use XellaTech\RandomGenCoPlugin\Model\ConverterResultInterface;

class Rot13Converter implements ConverterInterface
{
    public function __construct(
        private ConverterResultFactoryInterface $converterResultFactory,
    ) {
    }

    public function convert(string $text): ConverterResultInterface
    {
        return $this->converterResultFactory->createNewResult(str_rot13($text));
    }
}
