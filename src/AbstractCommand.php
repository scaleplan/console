<?php

namespace Scaleplan\Console;

/**
 * Class AbstractCommand
 *
 * @package Scaleplan\Console
 */
abstract class AbstractCommand implements CommandInterface
{
    public const SIGNATURE = 'sum x y';

    public const DEFAULTS = [
        'x' => 1,
        'y' => 2,
    ];

    /**
     * @var array
     */
    protected $arguments;

    /**
     * @param array $arguments
     */
    public function setArguments(array $arguments) : void
    {
        $this->arguments = $arguments;
    }

    /**
     * @param string $name
     *
     * @return mixed|null
     */
    public function getArgument(string $name)
    {
        return $this->arguments[$name] ?? self::DEFAULTS[$name] ?? null;
    }

    /**
     * Command handler
     */
    public function run() : void
    {
        echo $this->getArgument('x') * $this->getArgument('y');
    }
}