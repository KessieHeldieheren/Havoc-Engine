<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary;

/**
 * Havoc Core entity boundary rules factory.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class BoundaryRulesFactory
{
    /**
     * Create new entity boundary rules.
     *
     * @param int $x_negative
     * @param int $x_positive
     * @param int $y_negative
     * @param int $y_positive
     * @return BoundaryRulesInterface
     */
    public static function new(int $x_negative, int $x_positive, int $y_negative, int $y_positive): BoundaryRulesInterface
    {
        return new BoundaryRules($x_negative, $x_positive, $y_negative, $y_positive);
    }
}
