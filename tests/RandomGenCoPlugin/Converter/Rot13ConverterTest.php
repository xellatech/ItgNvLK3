<?php

declare(strict_types=1);

namespace App\Tests\RandomGenCoPlugin\Converter;

use App\Tests\Base\AbstractTestCase;
use XellaTech\RandomGenCoPlugin\Converter\ConverterInterface;
use XellaTech\RandomGenCoPlugin\Model\ConverterResultInterface;

class Rot13ConverterTest extends AbstractTestCase
{
    /**
     * @dataProvider scenarioData
     */
    public function testRot13Conversion(
        string $textToConvert,
        ?string $expectedText
    ): void {
        /** @var ConverterInterface $converter */
        $converter = $this->container->get('xella_tech.converter.rot13');
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
                'abcde',
                'nopqr',
            ],
            [
                'nopqr',
                'abcde',
            ],
        ];
    }
}
