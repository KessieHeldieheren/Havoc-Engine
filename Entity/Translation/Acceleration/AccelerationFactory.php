<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\Acceleration;

use Havoc\Engine\Entity\Translation\Velocity\VelocityInterface;

/**
 * Havoc Engine entity translation acceleration factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class AccelerationFactory
{
    /**
     * Create a new acceleration.
     *
     * @param VelocityInterface $velocity
     * @param float $acceleration
     * @return AccelerationInterface
     */
    public static function new(VelocityInterface $velocity, float $acceleration): AccelerationInterface
    {
        return new Acceleration($velocity, $acceleration);
    }
}
