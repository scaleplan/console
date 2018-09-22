<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class CommandClassNotImplementsCommandInterfaceException
 *
 * @package Scaleplan\Console\Exceptions
 */
class CommandClassNotImplementsCommandInterfaceException extends AbstractException
{
    public const MASSAGE = 'Command class not implements command interface.';
}