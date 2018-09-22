<?php

namespace Skaleplan\Console\Exceptions;

/**
 * Class CommandNameIsEmptyException
 *
 * @package Skaleplan\Console\Exceptions
 */
class CommandNameIsEmptyException extends AbstractException
{
    public const MASSAGE = 'Command name is empty.';
}