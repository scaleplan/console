<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class InvalidCommandSignatureException
 *
 * @package Scaleplan\Console\Exceptions
 */
class InvalidCommandSignatureException extends CommandException
{
    public const MESSAGE = 'Invalid command signature.';
}