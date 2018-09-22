<?php

namespace Skaleplan\Console\Exceptions;

/**
 * Class CommandClassNotImplementsCommandInterfaceException
 *
 * @package Skaleplan\Console\Exceptions
 */
class CommandClassNotImplementsCommandInterfaceException extends AbstractException
{
    public const MASSAGE = 'Command class not implements command interface.';
}