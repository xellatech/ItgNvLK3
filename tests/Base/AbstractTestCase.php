<?php

namespace App\Tests\Base;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class AbstractTestCase extends KernelTestCase
{
    protected ?ContainerInterface $container = null;

    protected function setUp(): void
    {
        $this->container = static::getContainer();
    }
}
