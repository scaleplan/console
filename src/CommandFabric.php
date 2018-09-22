<?php

namespace Scaleplan\Console;

use Scaleplan\Console\Exceptions\CommandClassNotFoundException;
use Scaleplan\Console\Exceptions\CommandClassNotInstantiableException;
use Scaleplan\Console\Exceptions\CommandClassNotImplementsCommandInterfaceException;
use Scaleplan\Console\Exceptions\CommandNameIsEmptyException;

/**
 * Class CommandFabric
 *
 * @package Scaleplan\Console
 */
class CommandFabric
{
    public const COMMANDS_NAMESPACE = 'App\\Commands\\';
    public const COMMAND_CLASS_POSTFIX = 'Command';

    /**
     * @param array $argv
     *
     * @return \Scaleplan\Console\CommandInterface
     * @throws \Scaleplan\Console\Exceptions\CommandClassNotFoundException
     * @throws \Scaleplan\Console\Exceptions\CommandClassNotImplementsCommandInterfaceException
     * @throws \Scaleplan\Console\Exceptions\CommandClassNotInstantiableException
     * @throws \Scaleplan\Console\Exceptions\CommandNameIsEmptyException
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

        /** @var \Scaleplan\Console\CommandInterface $command */
        $command = $refClass->newInstance();
        $command->setArguments($arguments);

        return $command;
    }
}