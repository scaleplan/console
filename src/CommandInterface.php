<?php

namespace Scaleplan\Console;

/**
 * Interface CommandInterface
 *
 * @package Scaleplan\Console
 */
interface CommandInterface
{
    public const SIGNATURE = '';

    public const DAEMON_TIMEOUT = 10000;

    /**
     * @param array $args
     */
    public function setArguments(array $args) : void;

    public function run() : void;
}