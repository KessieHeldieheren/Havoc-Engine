<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\BoundaryCode;

/**
 * Havoc Engine entity boundary codes register factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class BoundaryCodeFactory
{
    /**
     * Create a new boundary code register.
     *
     * @param int $boundary_code
     * @return BoundaryCodeInterface
     */
    public static function new(int $boundary_code): BoundaryCodeInterface
    {
        return new BoundaryCode($boundary_code);
    }
}