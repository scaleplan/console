<?php

namespace Skaleplan\Console\Exceptions;

/**
 * Class CommandClassNotInstantiableException
 *
 * @package Skaleplan\Console\Exceptions
 */
class CommandClassNotInstantiableException extends AbstractException
{
    public const MASSAGE = 'Command class not instantiable exception.';
}