<?php

declare(strict_types=1);

namespace XellaTech\RandomGenCoPlugin\Generator;

use XellaTech\RandomGenCoPlugin\Model\GeneratorResultInterface;

interface GeneratorInterface
{
    public function generate(): GeneratorResultInterface;
}
