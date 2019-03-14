<?php

namespace Scaleplan\Console;

use Scaleplan\Console\Exceptions\CommandClassNotFoundException;
use Scaleplan\Console\Exceptions\CommandClassNotInstantiableException;
use Scaleplan\Console\Exceptions\CommandClassNotImplementsCommandInterfaceException;
use Scaleplan\Console\Exceptions\CommandException;
use Scaleplan\Console\Exceptions\InvalidCommandSignatureException;
use function Scaleplan\Helpers\get_env;

/**
 * Class CommandFabric
 *
 * @package Scaleplan\Console
 */
class CommandFabric
{
    public const COMMANDS_NAMESPACE    = '\\App\\Commands\\';
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
     * @throws CommandException
     * @throws InvalidCommandSignatureException
     */
    public static function getCommand(string $commandName, array $args) : CommandInterface
    {
        $path = array_map(function (string $item) {
            return ucfirst($item);
        }, explode(':', $commandName));
        /** @var CommandInterface $className */
        $className = get_env('COMMANDS_NAMESPACE') ?? static::COMMANDS_NAMESPACE
            . implode('\\', $path)
            . get_env('COMMAND_CLASS_POSTFIX') ?? static::COMMAND_CLASS_POSTFIX;

        if (!class_exists($className)) {
            throw new CommandClassNotFoundException();
        }

        if (!\in_array(CommandInterface::class, class_implements($className), true)) {
            throw new CommandClassNotImplementsCommandInterfaceException();
        }

        if (!$className::SIGNATURE) {
            throw new InvalidCommandSignatureException();
        }

        try {
            $refClass = new \ReflectionClass($className);
            if (!$refClass->isInstantiable()) {
                throw new CommandClassNotInstantiableException();
            }

            /** @var \Scaleplan\Console\CommandInterface $command */
            $command = $refClass->newInstance();
            $command->setArguments($args);
        } catch (\ReflectionException $e) {
            throw new CommandException($e->getMessage());
        }

        return $command;
    }
}
