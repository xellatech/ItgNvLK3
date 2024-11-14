<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use XellaTech\RandomGenCoPlugin\Generator\GeneratorInterface;
use XellaTech\RandomGenCoPlugin\Model\ConverterResultInterface;
use XellaTech\RandomGenCoPlugin\Model\GeneratorResultInterface;
use XellaTech\RandomGenCoPlugin\Provider\CompositeGeneratorCollectionInterface;
use XellaTech\RandomGenCoPlugin\Provider\RandomConverterProviderInterface;

class GenConProcessingCommand extends Command
{
    public const COMMAND_NAME = 'app:gen-con:process';

    public function __construct(
        private CompositeGeneratorCollectionInterface $compositeGeneratorCollection,
        private RandomConverterProviderInterface $randomConverterProvider,
    ) {
        parent::__construct();
    }

    public function configure(): void
    {
        $this
            ->setName(self::COMMAND_NAME)
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $stackedResults = [];

        array_map(function (GeneratorInterface $generator) use (&$stackedResults) {
            $result = $generator->generate();

            if (GeneratorResultInterface::TYPE_RESULT_ITEM === $result->getType()) {
                $stackedResults[] = $this->randomConverterProvider->getRandomConverter()->convert($result->getResult());
            }

            if (GeneratorResultInterface::TYPE_RESULT_LIST === $result->getType()) {
                foreach ($result->getResultList() as $resultValue) {
                    $stackedResults[] = $this->randomConverterProvider->getRandomConverter()->convert($resultValue);
                }
            }
        }, $this->compositeGeneratorCollection->getGenerators());

        /** @var ConverterResultInterface $stackedResult */
        foreach ($stackedResults as $stackedResult) {
            $output->writeln(sprintf('<info>Generated and converted result: %s</info>', $stackedResult->getResult()));
        }

        return Command::SUCCESS;
    }
}
