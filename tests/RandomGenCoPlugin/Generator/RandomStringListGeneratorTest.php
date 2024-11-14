<?php

declare(strict_types=1);

namespace App\Tests\RandomGenCoPlugin\Generator;

use App\Tests\Base\AbstractTestCase;
use XellaTech\RandomGenCoPlugin\Factory\GeneratorResultFactoryInterface;
use XellaTech\RandomGenCoPlugin\Generator\RandomStringListGenerator;
use XellaTech\RandomGenCoPlugin\Model\GeneratorResultInterface;

class RandomStringListGeneratorTest extends AbstractTestCase
{
    /**
     * @dataProvider sizeScenario
     */
    public function testRandomStringListSize(int $length): void
    {
        $generator = new RandomStringListGenerator(
            $this->container->get(GeneratorResultFactoryInterface::class),
            $this->container->get('xella_tech.generator.string_list'),
            $length
        );
        $generatorResult = $generator->generate();

        // Check if result object is same as expected
        $this->assertInstanceOf(GeneratorResultInterface::class, $generatorResult);

        $this->assertEquals(count($generatorResult->getResultList()), $length);
    }

    private function sizeScenario(): array
    {
        return [
            [
                1,
            ],
            [
                2,
            ],
            [
                0,
            ],
        ];
    }
}
