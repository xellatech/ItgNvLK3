<?php

declare(strict_types=1);

namespace XellaTech\RandomGenCoPlugin\Model;

interface GeneratorResultInterface
{
    public const TYPE_RESULT_ITEM = 'result_item';

    public const TYPE_RESULT_LIST = 'result_list';

    public function getType(): string;

    public function setType(string $type): void;

    public function getResult(): ?string;

    public function setResult(?string $result): void;

    /**
     * @return array<string>
     */
    public function getResultList(): array;

    /**
     * @param array<string> $resultList
     */
    public function setResultList(array $resultList): void;
}
