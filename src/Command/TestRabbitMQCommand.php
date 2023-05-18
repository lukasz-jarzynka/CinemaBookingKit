<?php

namespace App\Command;

use App\Message\YourMessage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class TestRabbitMQCommand extends Command
{
    protected static $defaultName = 'app:test-rabbitmq';

    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;

        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $message = new YourMessage('Hello, RabbitMQ!');
        $this->bus->dispatch($message);

        $output->writeln('Message has been sent to RabbitMQ!');

        return Command::SUCCESS;
    }
}
