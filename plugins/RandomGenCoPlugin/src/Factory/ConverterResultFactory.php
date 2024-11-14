<?php

declare(strict_types=1);

namespace XellaTech\RandomGenCoPlugin\Factory;

use XellaTech\RandomGenCoPlugin\Model\ConverterResult;
use XellaTech\RandomGenCoPlugin\Model\ConverterResultInterface;

class ConverterResultFactory implements ConverterResultFactoryInterface
{
    public function createNew(): ConverterResultInterface
    {
        return new ConverterResult();
    }

    public function createNewResult(string $result): ConverterResultInterface
    {
        $converterResult = $this->createNew();
        $converterResult->setResult($result);

        return $converterResult;
    }
}
