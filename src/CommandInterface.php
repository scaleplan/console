<?php

namespace Scaleplan\Console;

/**
 * Interface CommandInterface
 *
 * @package Scaleplan\Console
 */
interface CommandInterface
{
    /**
     * @param array $args
     */
    public function setArguments(array $args) : void;

    public function run() : void;
}