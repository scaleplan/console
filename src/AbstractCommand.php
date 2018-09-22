<?php

namespace Scaleplan\Console;
use Scaleplan\Console\Exceptions\CommandArgumentNotDefined;

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
     * @return array
     */
    protected static function getArgumentsNames()
    {
        $argsNames = \array_values(\array_slice(explode(' ', self::SIGNATURE), 1));
        return \array_flip($argsNames) ?? [];
    }

    /**
     * @param array $arguments
     */
    public function setArguments(array $arguments) : void
    {
        $arguments = array_values($arguments);
        $argsNames = self::getArgumentsNames();
        
        array_walk($argsNames, function (&$value, $key) use ($arguments) {
            $value = $arguments[$value] ?? self::DEFAULTS[$key] ?? null;
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
     * Command handler
     */
    public function run() : void
    {
        echo $this->getArgument('x') * $this->getArgument('y');
    }
}