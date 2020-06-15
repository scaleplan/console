<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class InvalidCommandSignatureException
 *
 * @package Scaleplan\Console\Exceptions
 */
class InvalidCommandSignatureException extends CommandException
{
    public const MESSAGE = 'Неверная сигнатура команды.';
    public const CODE = 406;
}
