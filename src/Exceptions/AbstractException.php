<?php

namespace Scaleplan\Console\Exceptions;

/**
 * Class KafkaException
 *
 * @package Scaleplan\Console\Exceptions
 */
class AbstractException extends \Exception
{
    public const MESSAGE = 'Command execution error.';

    /**
     * KafkaException constructor.
     *
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(int $code = 0, \Throwable $previous = null)
    {
        parent::__construct(self::MESSAGE, $code, $previous);
    }
}