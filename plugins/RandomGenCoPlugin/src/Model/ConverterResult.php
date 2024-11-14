<?php

declare(strict_types=1);

namespace XellaTech\RandomGenCoPlugin\Model;

class ConverterResult implements ConverterResultInterface
{
    protected ?string $result = null;

    public function getResult(): ?string
    {
        return $this->result;
    }

    public function setResult(?string $result): void
    {
        $this->result = $result;
    }
}
