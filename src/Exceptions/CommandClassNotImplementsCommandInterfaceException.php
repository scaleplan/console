<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class CommandClassNotImplementsCommandInterfaceException
 *
 * @package Scaleplan\Console\Exceptions
 */
class CommandClassNotImplementsCommandInterfaceException extends CommandException
{
    public const MESSAGE = 'console.class-not-command';
    public const CODE = 406;
}
