<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class InvalidCommandSignatureException
 *
 * @package Scaleplan\Console\Exceptions
 */
class InvalidCommandSignatureException extends CommandException
{
    public const MESSAGE = 'console.wrong-signature';
    public const CODE = 406;
}
