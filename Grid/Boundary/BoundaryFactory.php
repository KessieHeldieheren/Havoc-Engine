<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid\Boundary;

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
     * @param int $x_negative
     * @param int $x_positive
     * @param int $y_negative
     * @param int $y_positive
     * @return BoundaryInterface
     */
    public static function new(int $x_negative, int $x_positive, int $y_negative, int $y_positive): BoundaryInterface
    {
        return new Boundary($x_negative, $x_positive, $y_negative, $y_positive);
    }
}
