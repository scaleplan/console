<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class CommandClassNotFoundException
 *
 * @package Scaleplan\Console\Exceptions
 */
class CommandClassNotFoundException extends CommandException
{
    public const MESSAGE = 'console.file-not-found';
    public const CODE = 404;
}
