<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class CommandClassNotInstantiableException
 *
 * @package Scaleplan\Console\Exceptions
 */
class CommandClassNotInstantiableException extends AbstractException
{
    public const MESSAGE = 'Command class not instantiable exception.';
}