<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class CommandNameIsEmptyException
 *
 * @package Scaleplan\Console\Exceptions
 */
class CommandNameIsEmptyException extends CommandException
{
    public const MESSAGE = 'Command name is empty.';
}