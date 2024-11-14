<?php

declare(strict_types=1);

namespace XellaTech\RandomGenCoPlugin\Factory;

use XellaTech\RandomGenCoPlugin\Model\GeneratorResultInterface;

interface GeneratorResultFactoryInterface
{
    public function createNew(): GeneratorResultInterface;

    public function createForResultIem(string $result): GeneratorResultInterface;

    public function createForResultList(array $result): GeneratorResultInterface;
}
