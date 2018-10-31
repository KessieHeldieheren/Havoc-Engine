<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\Duration;

/**
 * Havoc Engine entity translation duration factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class DurationFactory
{
    /**
     * Create new duration.
     *
     * @param int $duration
     * @return DurationInterface
     */
    public static function new(int $duration): DurationInterface
    {
        return new Duration($duration);
    }
}
