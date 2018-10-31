<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\Velocity;

/**
 * Havoc Engine entity translation velocity factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class VelocityFactory
{
    /**
     * Create a new velocity.
     *
     * @param float $velocity
     * @return VelocityInterface
     */
    public static function new(float $velocity): VelocityInterface
    {
        return new Velocity($velocity);
    }
}
