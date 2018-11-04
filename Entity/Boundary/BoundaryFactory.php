<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary;

/**
 * Havoc Engine grid boundary factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class BoundaryFactory
{
    /**
     * Create a new boundary.
     *
     * @return BoundaryInterface
     */
    public static function new(): BoundaryInterface
    {
        return new Boundary();
    }
}
