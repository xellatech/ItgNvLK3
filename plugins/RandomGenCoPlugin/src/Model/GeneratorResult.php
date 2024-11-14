<?php

declare(strict_types=1);

namespace XellaTech\RandomGenCoPlugin\Model;

class GeneratorResult implements GeneratorResultInterface
{
    protected string $type = self::TYPE_RESULT_ITEM;

    protected ?string $result = null;

    protected array $resultList = [];

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getResult(): ?string
    {
        return $this->result;
    }

    public function setResult(?string $result): void
    {
        $this->result = $result;
    }

    public function getResultList(): array
    {
        return $this->resultList;
    }

    public function setResultList(array $resultList): void
    {
        $this->resultList = $resultList;
    }
}
