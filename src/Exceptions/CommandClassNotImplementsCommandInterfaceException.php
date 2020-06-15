<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class CommandClassNotImplementsCommandInterfaceException
 *
 * @package Scaleplan\Console\Exceptions
 */
class CommandClassNotImplementsCommandInterfaceException extends CommandException
{
    public const MESSAGE = 'Класс команды не реализизует интерфейс команд.';
    public const CODE = 406;
}
