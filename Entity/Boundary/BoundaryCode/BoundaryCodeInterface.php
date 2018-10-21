<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\BoundaryCode;

/**
 * Havoc Engine entity boundary code interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface BoundaryCodeInterface
{
    /**
     * BoundaryCode constructor method.
     *
     * @param int $boundary_code
     */
    public function __construct(int $boundary_code);
    
    /**
     * Returns code.
     *
     * @return int
     */
    public function getCode(): int;
    
    /**
     * Sets code.
     *
     * @param int $code
     */
    public function setCode(int $code): void;
}
