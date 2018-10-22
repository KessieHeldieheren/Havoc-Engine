<?php
declare(strict_types=1);

namespace Havoc\Engine\Enumerator;

use Havoc\Engine\Exceptions\EngineException;

/**
 * Havoc Enumerable module.
 *
 * MIT License
 *
 * Copyright (c) 2018 Kessie Heldieheren
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software
 * and associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
 * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
 * ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @author Kessie Heldieheren <me@kessie.gold>
 * @package Havoc-Enumerable
 */
class EnumeratorException extends EngineException
{
    public const NAME_INVALID = 0x1;
    public const REFLECTION_ERROR = 0x2;
    public const VALUE_NOT_FOUND = 0x3;
    
    /**
     * Constant name does not exist.
     *
     * @param string $name
     * @return EnumeratorException
     */
    public static function nameInvalid(string $name): self
    {
        return new self (
            sprintf("Enumeration error: the name being searched for (%s) does not have a valid name.", $name),
            self::NAME_INVALID
        );
    }

    /**
     * Enumerable died with a reflection exception.
     *
     * @param string $msg
     * @return EnumeratorException
     */
    public static function reflectionError(string $msg): self
    {
        return new self (
            sprintf("A reflection error occurred: %s", $msg),
            self::REFLECTION_ERROR
        );
    }
    
    /**
     * No constants with the given value exist.
     *
     * @return EnumeratorException
     */
    public static function valueNotFound(): self
    {
        return new self (
            "A value being searched for does not correlate to any enumerable element.",
            self::VALUE_NOT_FOUND
        );
    }
}
