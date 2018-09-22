<?php

namespace Skaleplan\Console\Exceptions;

/**
 * Class AbstractException
 *
 * @package Skaleplan\Console\Exceptions
 */
class AbstractException extends \Exception
{
    public const MESSAGE = 'Command execution error.';

    /**
     * AbstractException constructor.
     *
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(int $code = 0, \Throwable $previous = null)
    {
        parent::__construct(self::MESSAGE, $code, $previous);
    }
}