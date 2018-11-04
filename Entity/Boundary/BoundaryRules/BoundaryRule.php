<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\BoundaryRules;

use Havoc\Engine\Enumerator\Enumerator;

/**
 * Havoc Engine entity boundary rules list.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
abstract class BoundaryRule extends Enumerator
{
    /**
     * Clamps entity to the edge of the boundary.
     */
    public const CLAMP = 0x1;
    
    /**
     * Loops entity to the opposite boundary.
     */
    public const LOOP = 0x2;
    
    /**
     * Entity ignores boundary and becomes invisible.
     */
    public const HIDE = 0x3;
    
    /**
     * Entity ignores boundary.
     */
    public const ALLOW = 0x4;
}
