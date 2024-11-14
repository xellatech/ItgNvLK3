<?php

declare(strict_types=1);

namespace App\Tests\RandomGenCoPlugin\Generator;

use App\Tests\Base\AbstractTestCase;
use XellaTech\RandomGenCoPlugin\Factory\GeneratorResultFactoryInterface;
use XellaTech\RandomGenCoPlugin\Generator\GeneratorInterface;
use XellaTech\RandomGenCoPlugin\Generator\RandomStringListGenerator;

class RandomStringListGeneratorTest extends AbstractTestCase
{
    /**
     * @dataProvider sizeScenario
     */
    public function testRandomStringListSize(int $length): void
    {
        /** @var GeneratorInterface $generator */
        $generator = new RandomStringListGenerator(
            $this->container->get(GeneratorResultFactoryInterface::class),
            $this->container->get('xella_tech.generator.string_list'),
            $length
        );
        $generatorResult = $generator->generate()->getResultList();

        $this->assertEquals(count($generatorResult), $length);
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
