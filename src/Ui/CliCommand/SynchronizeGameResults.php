<?php

declare(strict_types=1);

namespace App\Ui\CliCommand;

use App\Application\Command\SynchronizeGameResults\SynchronizeGameResultsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

final class SynchronizeGameResults extends Command
{
    /**
     * @var MessageBusInterface
     */
    private MessageBusInterface $commandBus;

    /**
     * SynchronizeGameResults constructor.
     */
    public function __construct(MessageBusInterface $commandBus)
    {
        parent::__construct();
        $this->commandBus = $commandBus;
    }

    public function configure()
    {
        $this->setName('back-office:game:results:synchronize');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
//        At the moment I haven't knowledge about external api, that's why is one.
//        This is not magic number :)
        $this->commandBus->dispatch(new SynchronizeGameResultsCommand(1));

        return 0;
    }
}
