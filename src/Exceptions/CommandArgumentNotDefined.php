<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class CommandArgumentNotDefined
 *
 * @package Scaleplan\Console\Exceptions
 */
class CommandArgumentNotDefined extends CommandException
{
    public const MESSAGE = 'Не задан аргумент команды.';
    public const CODE = 404;
}
