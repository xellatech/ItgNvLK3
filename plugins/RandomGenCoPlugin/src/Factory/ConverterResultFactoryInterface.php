<?php

declare(strict_types=1);

namespace XellaTech\RandomGenCoPlugin\Factory;

use XellaTech\RandomGenCoPlugin\Model\ConverterResultInterface;

interface ConverterResultFactoryInterface
{
    public function createNew(): ConverterResultInterface;

    public function createNewResult(string $result): ConverterResultInterface;
}
