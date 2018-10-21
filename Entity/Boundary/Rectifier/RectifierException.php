<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\Rectifier;

use Havoc\Engine\Exceptions\HavocEngineException;

/**
 * Havoc Engine rectifier exceptions.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class RectifierException extends HavocEngineException
{
    public const RECTIFIER_BAD_CLASS = 0x1;
    public const BOUNDARY_CODE_INVALID = 0x2;
    
    /**
     * @param string $given_class
     * @return RectifierException
     */
    public static function rectifierBadClass(string $given_class): self
    {
        $required_class = RectifierInterface::class;
    
        return new self (
            sprintf("Cannot instantiate a rectifier using %s, as it must implement %s.", $given_class, $required_class),
            self::RECTIFIER_BAD_CLASS
        );
    }
    
    /**
     * @param int $boundary_code
     * @return RectifierException
     */
    public static function boundaryCodeInvalid(int $boundary_code): self
    {
        return new self (
            sprintf("The boundary code %s is not a valid code.", $boundary_code),
            self::BOUNDARY_CODE_INVALID
        );
    }
}
