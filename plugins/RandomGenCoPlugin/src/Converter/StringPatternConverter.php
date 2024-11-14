<?php

declare(strict_types=1);

namespace XellaTech\RandomGenCoPlugin\Converter;

use XellaTech\RandomGenCoPlugin\Factory\ConverterResultFactoryInterface;
use XellaTech\RandomGenCoPlugin\Model\ConverterResultInterface;

class StringPatternConverter implements ConverterInterface
{
    public function __construct(
        private ConverterResultFactoryInterface $converterResultFactory,
    ) {
    }

    public function convert(string $text): ConverterResultInterface
    {
        $pattern = '/[a-z]/i';
        $convertedText = '';

        for ($i = 0; $i < strlen($text); ++$i) {
            $value = $text[$i];
            preg_match($pattern, $value, $matches);

            if (!$matches) {
                // Adding current value to converted text
                $convertedText .= $value;

                continue;
            }

            // Converting char to number
            $convertedText .= sprintf('/%s', (ord(strtolower($value)) - ord('a')) + 1);
        }

        return $this->converterResultFactory->createNewResult(ltrim($convertedText, '/'));
    }
}
