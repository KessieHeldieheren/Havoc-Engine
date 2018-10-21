<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\BoundaryCode;

use Havoc\Engine\Enumerator\Enumerator;

/**
 * Havoc Engine entity boundary codes register.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class BoundaryCode extends Enumerator implements BoundaryCodeInterface
{
    public const X_NEGATIVE = 0x1;
    public const X_POSITIVE = 0x2;
    public const Y_NEGATIVE = 0x3;
    public const Y_POSITIVE = 0x4;
    
    /**
     * Boundary code.
     *
     * @var int
     */
    private $code;
    
    /**
     * BoundaryCode constructor method.
     *
     * @param int $boundary_code
     */
    public function __construct(int $boundary_code)
    {
        $this->setCode($boundary_code);
    }
    
    /**
     * Returns code.
     *
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }
    
    /**
     * Sets code.
     *
     * @param int $code
     */
    public function setCode(int $code): void
    {
        if (false === self::validValue($code)) {
            throw BoundaryCodeException::boundaryCodeInvalid($code);
        }
        
        $this->code = $code;
    }
}
