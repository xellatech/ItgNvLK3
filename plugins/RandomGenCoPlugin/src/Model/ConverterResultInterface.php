<?php

declare(strict_types=1);

namespace XellaTech\RandomGenCoPlugin\Model;

interface ConverterResultInterface
{
    public function getResult(): ?string;

    public function setResult(?string $result): void;
}
