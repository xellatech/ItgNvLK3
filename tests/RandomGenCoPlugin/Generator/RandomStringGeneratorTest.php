<?php

declare(strict_types=1);

namespace App\Tests\RandomGenCoPlugin\Generator;

use App\Tests\Base\AbstractTestCase;
use XellaTech\RandomGenCoPlugin\Factory\GeneratorResultFactoryInterface;
use XellaTech\RandomGenCoPlugin\Generator\RandomStringGenerator;
use XellaTech\RandomGenCoPlugin\Model\GeneratorResultInterface;

class RandomStringGeneratorTest extends AbstractTestCase
{
    /**
     * @dataProvider lengthScenario
     */
    public function testRandomStringGeneratorLength(int $length): void
    {
        $generator = new RandomStringGenerator(
            $this->container->get(GeneratorResultFactoryInterface::class),
            $this->container->getParameter('xella_tech.param.generator_item.pattern'),
            $length
        );
        $generatorResult = $generator->generate();

        // Check if result object is same as expected
        $this->assertInstanceOf(GeneratorResultInterface::class, $generatorResult);

        $this->assertEquals(strlen($generatorResult->getResult()), $length);
    }

    private function lengthScenario(): array
    {
        return [
            [
                8,
            ],
            [
                9,
            ],
            [
                0,
            ],
        ];
    }

    /**
     * @dataProvider patternScenario
     */
    public function testRandomStringGeneratorPattern(
        string $pattern,
        ?string $matchPattern,
        ?string $noMatchPattern,
    ): void {
        $generator = new RandomStringGenerator(
            $this->container->get(GeneratorResultFactoryInterface::class),
            $pattern,
            $this->container->getParameter('xella_tech.param.generator_item.length')
        );
        $generatorResult = $generator->generate();

        // Check if result object is same as expected
        $this->assertInstanceOf(GeneratorResultInterface::class, $generatorResult);

        if (null !== $matchPattern) {
            $this->assertMatchesRegularExpression($matchPattern, $generatorResult->getResult());
        }

        if (null !== $noMatchPattern) {
            $this->assertDoesNotMatchRegularExpression($noMatchPattern, $generatorResult->getResult());
        }
    }

    private function patternScenario(): array
    {
        return [
            [
                'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789',
                '/[a-z]|[0-9]|[A-Z]/',
                null,
            ],
            [
                '123456789',
                '/[0-9]/',
                null,
            ],
            [
                'abcdefghijklmnopqrstuvwxyz',
                null,
                '/[0-9]/',
            ],
        ];
    }
}
