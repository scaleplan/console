<?php

use Scaleplan\Console\ConsolePrinter;

/**
 * @param $message
 *
 * @throws \JakubOnderka\PhpConsoleColor\InvalidStyleException
 */
function print_ok($message)
{
    ConsolePrinter::getInstance()->printOk($message);
}

/**
 * @param $message
 *
 * @throws \JakubOnderka\PhpConsoleColor\InvalidStyleException
 */
function print_error($message)
{
    ConsolePrinter::getInstance()->printError($message);
}

/**
 * @param $message
 *
 * @throws \JakubOnderka\PhpConsoleColor\InvalidStyleException
 */
function print_info($message)
{
    ConsolePrinter::getInstance()->printInfo($message);
}
