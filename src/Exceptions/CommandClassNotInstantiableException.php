<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class CommandClassNotInstantiableException
 *
 * @package Scaleplan\Console\Exceptions
 */
class CommandClassNotInstantiableException extends CommandException
{
    public const MESSAGE = 'console.class-not-instantiable';
    public const CODE = 406;
}
