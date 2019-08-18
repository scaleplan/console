<?php

namespace Scaleplan\Console;

/**
 * Interface CommandInterface
 *
 * @package Scaleplan\Console
 */
interface CommandInterface
{
    public const DAEMON_TIMEOUT = 5;

    public const DAEMON_RESTART_AFTER = 86400;

    /**
     * @param array $args
     */
    public function setArguments(array $args) : void;

    public function run() : void;
}
