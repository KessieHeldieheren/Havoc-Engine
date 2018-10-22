<?php
declare(strict_types=1);

namespace Havoc\Engine\Tick;

/**
 * Havoc Engine tick factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class TickFactory
{
    /**
     * Create a new tick.
     *
     * @return TickInterface
     */
    public static function new(): TickInterface
    {
        return new Tick();
    }
}
