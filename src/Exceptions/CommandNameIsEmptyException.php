<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class CommandNameIsEmptyException
 *
 * @package Scaleplan\Console\Exceptions
 */
class CommandNameIsEmptyException extends AbstractException
{
    public const MESSAGE = 'Command name is empty.';
}