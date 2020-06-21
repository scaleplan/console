<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class CommandArgumentNotDefined
 *
 * @package Scaleplan\Console\Exceptions
 */
class CommandArgumentNotDefined extends CommandException
{
    public const MESSAGE = 'console.arg-not-set';
    public const CODE = 404;
}
