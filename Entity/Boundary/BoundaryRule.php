<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary;

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
    public const CLAMP = 0x1;
    public const LOOP = 0x2;
}
