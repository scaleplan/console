<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class CommandClassNotImplementsCommandInterfaceException
 *
 * @package Scaleplan\Console\Exceptions
 */
class CommandClassNotImplementsCommandInterfaceException extends CommandException
{
    public const MESSAGE = 'Command class not implements command interface.';
    public const CODE = 406;
}
