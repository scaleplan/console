<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class CommandSignatureIsEmptyException
 *
 * @package Scaleplan\Console\Exceptions
 */
class CommandSignatureIsEmptyException extends CommandException
{
    public const MESSAGE = 'console.empty-signature';
}
