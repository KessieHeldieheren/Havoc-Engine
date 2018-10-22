<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\BoundaryRules;

/**
 * Havoc Engine entity boundary rules factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class RulesFactory
{
    /**
     * Create new entity boundary rules.
     *
     * @param int $x_negative
     * @param int $x_positive
     * @param int $y_negative
     * @param int $y_positive
     * @return RulesInterface
     */
    public static function new(int $x_negative, int $x_positive, int $y_negative, int $y_positive): RulesInterface
    {
        return new Rules($x_negative, $x_positive, $y_negative, $y_positive);
    }
}
