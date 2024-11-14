<?php

declare(strict_types=1);

namespace XellaTech\RandomGenCoPlugin\Factory;

use XellaTech\RandomGenCoPlugin\Model\GeneratorResult;
use XellaTech\RandomGenCoPlugin\Model\GeneratorResultInterface;

class GeneratorResultFactory implements GeneratorResultFactoryInterface
{
    public function createNew(): GeneratorResultInterface
    {
        return new GeneratorResult();
    }

    public function createForResultIem(string $result): GeneratorResultInterface
    {
        $generatorResult = $this->createNew();
        $generatorResult->setType(GeneratorResultInterface::TYPE_RESULT_ITEM);
        $generatorResult->setResult($result);

        return $generatorResult;
    }

    public function createForResultList(array $result): GeneratorResultInterface
    {
        $generatorResult = $this->createNew();
        $generatorResult->setType(GeneratorResultInterface::TYPE_RESULT_LIST);
        $generatorResult->setResultList($result);

        return $generatorResult;
    }
}
