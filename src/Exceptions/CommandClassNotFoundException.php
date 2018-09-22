<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class CommandClassNotFoundException
 *
 * @package Scaleplan\Console\Exceptions
 */
class CommandClassNotFoundException extends AbstractException
{
    public const MESSAGE = 'Command class not found.';
}