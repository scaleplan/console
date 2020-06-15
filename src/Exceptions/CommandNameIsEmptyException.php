<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class CommandNameIsEmptyException
 *
 * @package Scaleplan\Console\Exceptions
 */
class CommandNameIsEmptyException extends CommandException
{
    public const MESSAGE = 'Пустое имя команды.';
}
