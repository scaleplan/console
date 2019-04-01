<?php

namespace Scaleplan\Console;

use JakubOnderka\PhpConsoleColor\ConsoleColor;
use Scaleplan\GetInstance\GetInstanceTrait;

/**
 * Class ConsolePrinter
 *
 * @package Scaleplan\Console
 */
class ConsolePrinter
{
    use GetInstanceTrait;

    public const OK_TYPE = 40;
    public const ERROR_TYPE = 160;
    public const INFO_TYPE = 226;

    public const ALLOW_TYPES = [
        self::OK_TYPE,
        self::ERROR_TYPE,
        self::INFO_TYPE
    ];

    /**
     * @var ConsoleColor
     */
    protected $printer;

    /**
     * ConsolePrinter constructor.
     */
    public function __construct()
    {
        $this->printer = new ConsoleColor();
    }

    /**
     * @param string $message
     * @param string $type
     *
     * @throws \JakubOnderka\PhpConsoleColor\InvalidStyleException
     */
    public function print(string $message, string $type = null) : void
    {
        if (\in_array($type, static::ALLOW_TYPES, true)) {
                $message = $this->printer->apply('color_' . $type, $message);
        }

        echo $message . '\n';
    }

    /**
     * @param $message
     *
     * @throws \JakubOnderka\PhpConsoleColor\InvalidStyleException
     */
    public function printOk($message) : void
    {
        $this->print($message, static::OK_TYPE);
    }

    /**
     * @param $message
     *
     * @throws \JakubOnderka\PhpConsoleColor\InvalidStyleException
     */
    public function printError($message) : void
    {
        $this->print($message, static::ERROR_TYPE);
    }

    /**
     * @param $message
     *
     * @throws \JakubOnderka\PhpConsoleColor\InvalidStyleException
     */
    public function printInfo($message) : void
    {
        $this->print($message, static::INFO_TYPE);
    }
}
