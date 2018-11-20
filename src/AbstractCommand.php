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
    public const SIGNATURE = '';

    /**
     * @var array
     */
    public static $defaults = [];

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
        if (gettype(static::SIGNATURE) !== 'string' || !static::SIGNATURE) {
            throw new CommandSignatureIsEmptyException();
        }
    }

    /**
     * @return array
     */
    protected static function getArgumentsNames()
    {
        $argsNames = \array_values(\array_slice(explode(' ', static::SIGNATURE), 1));
        return $argsNames ?? [];
    }

    /**
     * @param array $arguments
     */
    public function setArguments(array $arguments) : void
    {
        $argsNames = \array_flip(static::getArgumentsNames());
        $arguments = array_values($arguments);
        
        array_walk($argsNames, function (&$value, $argName) use ($arguments) {
            $value = $arguments[$value] ?? static::DEFAULTS[$key] ?? null;
        });

        $this->arguments = $argsNames;
    }

    /**
     * @param string $name
     *
     * @return mixed
     *
     * @throws \Scaleplan\Console\Exceptions\CommandArgumentNotDefined
     */
    public function getArgument(string $name)
    {
        if (!isset($this->arguments[$name])) {
            throw new CommandArgumentNotDefined();
        }

        return $this->arguments[$name];
    }

    /**
     * @throws \Scaleplan\Console\Exceptions\CommandArgumentNotDefined
     */
    abstract public function run() : void;
}