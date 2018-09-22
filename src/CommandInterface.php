<?php

namespace Skaleplan\Console;

/**
 * Interface CommandInterface
 *
 * @package Skaleplan\Console
 */
interface CommandInterface
{
    /**
     * @param array $args
     */
    public function setArguments(array $args) : void;

    public function run() : void;
}