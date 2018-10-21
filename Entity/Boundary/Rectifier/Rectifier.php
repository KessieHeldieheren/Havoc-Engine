<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\Rectifier;

use Havoc\Engine\Enumerator\Enumerator;

/**
 * Havoc Engine entity boundary rectifier reverse look-up enumerator.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class Rectifier extends Enumerator
{
    public const CLAMP = RectifierClamp::class;
    public const LOOP =  RectifierLoop::class;
}
