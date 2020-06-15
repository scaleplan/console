<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class CommandClassNotInstantiableException
 *
 * @package Scaleplan\Console\Exceptions
 */
class CommandClassNotInstantiableException extends CommandException
{
    public const MESSAGE = 'Невозможно создать объект класса команды.';
    public const CODE = 406;
}
