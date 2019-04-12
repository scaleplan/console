<?php

namespace Scaleplan\Console;

use Scaleplan\Console\Exceptions\CommandArgumentNotDefined;
use Scaleplan\Console\Exceptions\CommandSignatureIsEmptyException;

/**
 * Class AbstractCommand
 *
 * @package Scaleplan\Console
 */
abstract class AbstractCommand implements CommandInterface
{
    public const SIGNATURE = null;

    public const DAEMON_TIMEOUT = 10000;

    public const DEFAULTS = [];

    /**
     * @var array
     */
    protected $arguments;

    /**
     * AbstractCommand constructor.
     * 
     * @throws CommandSignatureIsEmptyException
     */
    public function __construct()
    {
        if (!static::SIGNATURE && !is_string(static::SIGNATURE)) {
            throw new CommandSignatureIsEmptyException();
        }
    }

    /**
     * @return array
     */
    protected static function getArgumentsNames() : array
    {
        $argsNames = \array_values(\array_slice(array_map('trim', explode(' ', static::SIGNATURE)), 1));
        return $argsNames ?? [];
    }

    /**
     * @param array $arguments
     */
    public function setArguments(array $arguments) : void
    {
        $argsNames = \array_flip(static::getArgumentsNames());
        $arguments = array_values($arguments);
        
        array_walk($argsNames, static function (&$value, $argName) use ($arguments) {
            $value = $arguments[$value] ?? static::DEFAULTS[$argName] ?? null;
        });

        $this->arguments = $argsNames;
    }

    /**
     * @param string $name
     *
     * @return mixed
     *
     * @throws CommandArgumentNotDefined
     */
    public function getArgument(string $name)
    {
        if (!isset($this->arguments[$name])) {
            throw new CommandArgumentNotDefined();
        }

        return $this->arguments[$name];
    }

    /**
     * @throws CommandArgumentNotDefined
     */
    abstract public function run() : void;
}
