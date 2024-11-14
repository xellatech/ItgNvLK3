<?php

declare(strict_types=1);

namespace XellaTech\RandomGenCoPlugin\Converter;

use XellaTech\RandomGenCoPlugin\Model\ConverterResultInterface;

interface ConverterInterface
{
    public function convert(string $text): ConverterResultInterface;
}
