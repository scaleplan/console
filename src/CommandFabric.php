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
    public const COMMANDS_NAMESPACE = '\\App\\Commands\\';
    public const COMMAND_CLASS_POSTFIX = 'Command';

    /**
     * @param string $commandName
     * @param array $args
     *
     * @return CommandInterface
     * 
     * @throws CommandClassNotFoundException
     * @throws CommandClassNotImplementsCommandInterfaceException
     * @throws CommandClassNotInstantiableException
     */
    public static function getCommand(string $commandName, array $args): CommandInterface
    {
        $path = array_map(function (string $item) {
            return ucfirst($item);
        }, explode(':', $commandName));
        $className = getenv('COMMANDS_NAMESPACE') ?? self::COMMANDS_NAMESPACE
            . implode('\\', $path)
            . getenv('COMMAND_CLASS_POSTFIX') ?? self::COMMAND_CLASS_POSTFIX;

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
        $command->setArguments($args);

        return $command;
    }
}