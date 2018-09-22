<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class CommandNameIsEmptyException
 *
 * @package Scaleplan\Console\Exceptions
 */
class CommandNameIsEmptyException extends AbstractException
{
    public const MASSAGE = 'Command name is empty.';
}