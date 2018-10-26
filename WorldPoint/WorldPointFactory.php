<?php
declare(strict_types=1);

namespace Havoc\Engine\WorldPoint;

use Havoc\Engine\Coordinates\CoordinatesInterface;

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
     * @param CoordinatesInterface $coordinates
     * @return WorldPointInterface
     */
    public static function newEmpty(string $icon, CoordinatesInterface $coordinates): WorldPointInterface
    {
        return new EmptyWorldPoint($icon, $coordinates);
    }
}
