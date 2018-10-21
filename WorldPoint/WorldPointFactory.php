<?php
declare(strict_types=1);

namespace Havoc\Engine\WorldPoint;

/**
 * Havoc Engine world point factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class WorldPointFactory
{
    /**
     * Create a new empty world point.
     *
     * @param string $icon
     * @return WorldPointInterface
     */
    public static function newEmpty(string $icon): WorldPointInterface
    {
        return new EmptyWorldPoint($icon);
    }
}
