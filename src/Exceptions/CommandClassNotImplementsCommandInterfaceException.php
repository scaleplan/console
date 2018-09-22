<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class CommandClassNotImplementsCommandInterfaceException
 *
 * @package Scaleplan\Console\Exceptions
 */
class CommandClassNotImplementsCommandInterfaceException extends AbstractException
{
    public const MESSAGE = 'Command class not implements command interface.';
}