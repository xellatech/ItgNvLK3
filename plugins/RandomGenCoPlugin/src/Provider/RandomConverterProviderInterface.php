<?php

declare(strict_types=1);

namespace XellaTech\RandomGenCoPlugin\Provider;

use XellaTech\RandomGenCoPlugin\Converter\ConverterInterface;

interface RandomConverterProviderInterface
{
    public function addConverter(ConverterInterface $converter): void;

    public function getRandomConverter(): ConverterInterface;
}
