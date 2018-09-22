<?php

namespace Skaleplan\Console\Exceptions;

/**
 * Class CommandClassNotFoundException
 *
 * @package Skaleplan\Console\Exceptions
 */
class CommandClassNotFoundException extends AbstractException
{
    public const MASSAGE = 'Command class not found.';
}