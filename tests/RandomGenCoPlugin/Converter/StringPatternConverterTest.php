<?php

declare(strict_types=1);

namespace App\Tests\RandomGenCoPlugin\Converter;

use App\Tests\Base\AbstractTestCase;
use XellaTech\RandomGenCoPlugin\Converter\ConverterInterface;
use XellaTech\RandomGenCoPlugin\Model\ConverterResultInterface;

class StringPatternConverterTest extends AbstractTestCase
{
    /**
     * @dataProvider scenarioData
     */
    public function testStringConversion(
        string $textToConvert,
        ?string $expectedText
    ): void {
        /** @var ConverterInterface $converter */
        $converter = $this->container->get('xella_tech.converter.string_pattern');
        $converterResult = $converter->convert($textToConvert);

        // Check if result object is same as expected
        $this->assertInstanceOf(ConverterResultInterface::class, $converterResult);

        // Check if converted result is same as expected
        $this->assertEquals($expectedText, $converterResult->getResult());
    }

    private function scenarioData(): array
    {
        return [
            [
                '22aAcd',
                '22/1/1/3/4',
            ],
            [
                '11aAcd',
                '11/1/1/3/4',
            ],
            [
                '0',
                '0',
            ],
        ];
    }
}
