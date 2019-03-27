<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class CommandException
 *
 * @package Scaleplan\Console\Exceptions
 */
class CommandException extends \Exception
{
    public const MESSAGE = 'Command execution error.';

    /**
     * CommandException constructor.
     *
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(string $message = '', int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message ?: static::MESSAGE, $code, $previous);
    }
}
