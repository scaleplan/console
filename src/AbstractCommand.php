<?php
declare(strict_types=1);

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

    public const DEFAULTS = [];

    /**
     * @var array
     */
    protected $arguments = [];

    /**
     * @var array
     */
    protected $flags = [];

    /**
     * AbstractCommand constructor.
     *
     * @param array $arguments
     *
     * @throws CommandSignatureIsEmptyException
     * @throws \ReflectionException
     * @throws \Scaleplan\DependencyInjection\Exceptions\ContainerTypeNotSupportingException
     * @throws \Scaleplan\DependencyInjection\Exceptions\DependencyInjectionException
     * @throws \Scaleplan\DependencyInjection\Exceptions\ParameterMustBeInterfaceNameOrClassNameException
     * @throws \Scaleplan\DependencyInjection\Exceptions\ReturnTypeMustImplementsInterfaceException
     */
    public function __construct(array $arguments)
    {
        if (!static::SIGNATURE && !is_string(static::SIGNATURE)) {
            throw new CommandSignatureIsEmptyException();
        }

        $this->setArguments($arguments);
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
        $argsNames = static::getArgumentsNames();

        foreach ($arguments as $argument) {
            if ('-' === ((string)$argument)[0]) {
                $this->flags[] = (string)$argument;
                continue;
            }

            $this->arguments[current($argsNames)] = $argument;
            next($argsNames);
        }


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
     * @param string $opt
     *
     * @return mixed
     */
    public function isFlagPresent(string $opt)
    {
        return in_array($opt, $this->flags, true);
    }

    /**
     * @throws CommandArgumentNotDefined
     */
    abstract public function run() : void;
}
