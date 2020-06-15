<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class CommandClassNotFoundException
 *
 * @package Scaleplan\Console\Exceptions
 */
class CommandClassNotFoundException extends CommandException
{
    public const MESSAGE = 'Файл команды не найден.';
    public const CODE = 404;
}
