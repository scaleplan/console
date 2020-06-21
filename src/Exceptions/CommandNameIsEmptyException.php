<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class CommandNameIsEmptyException
 *
 * @package Scaleplan\Console\Exceptions
 */
class CommandNameIsEmptyException extends CommandException
{
    public const MESSAGE = 'console.empty-command-name';
}
