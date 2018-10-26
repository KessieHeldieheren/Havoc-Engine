<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\BoundaryRectifier;

use Havoc\Engine\Entity\Boundary\BoundaryRectifier\BoundaryRectifierAllow\BoundaryRectifierAllow;
use Havoc\Engine\Entity\Boundary\BoundaryRectifier\BoundaryRectifierClamp\BoundaryRectifierClamp;
use Havoc\Engine\Entity\Boundary\BoundaryRectifier\BoundaryRectifierHide\BoundaryRectifierHide;
use Havoc\Engine\Entity\Boundary\BoundaryRectifier\BoundaryRectifierLoop\BoundaryRectifierLoop;
use Havoc\Engine\Enumerator\Enumerator;

/**
 * Havoc Engine entity boundary rectifier reverse look-up enumerator.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class BoundaryRectifier extends Enumerator
{
    public const CLAMP = BoundaryRectifierClamp::class;
    public const LOOP =  BoundaryRectifierLoop::class;
    public const HIDE = BoundaryRectifierHide::class;
    public const ALLOW = BoundaryRectifierAllow::class;
}
