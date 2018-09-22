<?php

namespace Skaleplan\Console;

use Skaleplan\Console\Exceptions\CommandClassNotFoundException;
use Skaleplan\Console\Exceptions\CommandClassNotInstantiableException;
use Skaleplan\Console\Exceptions\CommandClassNotImplementsCommandInterfaceException;
use Skaleplan\Console\Exceptions\CommandNameIsEmptyException;

/**
 * Class CommandFabric
 *
 * @package App\classes\console
 */
class CommandFabric
{
    public const COMMANDS_NAMESPACE = 'App\Commands\\';
    public const COMMAND_CLASS_POSTFIX = 'Command';

    /**
     * @param array $argv
     *
     * @return \Skaleplan\Console\CommandInterface
     * @throws \Skaleplan\Console\Exceptions\CommandClassNotFoundException
     * @throws \Skaleplan\Console\Exceptions\CommandClassNotImplementsCommandInterfaceException
     * @throws \Skaleplan\Console\Exceptions\CommandClassNotInstantiableException
     * @throws \Skaleplan\Console\Exceptions\CommandNameIsEmptyException
     */
    public static function getCommand(array $argv): CommandInterface
    {
        if (!$commandName = \array_shift($argv)) {
            throw new CommandNameIsEmptyException();
        }

        $arguments = $argv;

        $className = self::COMMANDS_NAMESPACE . str_replace(':', '\\', $commandName) . self::COMMAND_CLASS_POSTFIX;
        if (!\in_array(CommandInterface::class, class_implements($className), true)) {
            throw new CommandClassNotImplementsCommandInterfaceException();
        }

        try {
            $refClass = new \ReflectionClass($className);
        } catch (\ReflectionException $e) {
            throw new CommandClassNotFoundException();
        }

        if (!$refClass->isInstantiable()) {
            throw new CommandClassNotInstantiableException();
        }

        /** @var \Skaleplan\Console\CommandInterface $command */
        $command = $refClass->newInstance();
        $command->setArguments($arguments);

        return $command;
    }
}