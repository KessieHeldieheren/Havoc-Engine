<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary;

use Havoc\Engine\Enumerator\Enumerator;

/**
 * Havoc Core entity boundary rules list.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
abstract class BoundaryRule extends Enumerator
{
    public const NONE = 0x0;
    public const CLAMP = 0x1;
    public const DIE = 0x2;
    public const LOOP = 0x3;
    public const REVERT = 0x4;
    public const INITIAL = 0x5;
}
