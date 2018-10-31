<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\Acceleration;

use Havoc\Engine\Entity\Translation\Velocity\VelocityInterface;

/**
 * Havoc Engine entity translation acceleration interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface AccelerationInterface
{
    /**
     * Acceleration constructor method.
     *
     * @param VelocityInterface $velocity
     * @param float $acceleration
     */
    public function __construct(VelocityInterface $velocity, float $acceleration);
    
    /**
     * Returns acceleration.
     *
     * @return float
     */
    public function getAcceleration(): float;
    
    /**
     * Sets acceleration.
     *
     * @param float $acceleration
     */
    public function setAcceleration(float $acceleration): void;
    
    /**
     * Returns velocity.
     *
     * @return VelocityInterface
     */
    public function getVelocity(): VelocityInterface;
    
    /**
     * Sets velocity.
     *
     * @param VelocityInterface $velocity
     */
    public function setVelocity(VelocityInterface $velocity): void;
}
