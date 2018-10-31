<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\Velocity;

/**
 * Havoc Engine entity translation velocity interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface VelocityInterface
{
    /**
     * Velocity constructor method.
     *
     * @param float $velocity
     */
    public function __construct(float $velocity);
    
    /**
     * Returns velocity.
     *
     * @return float
     */
    public function getVelocity(): float;
    
    /**
     * Sets velocity.
     *
     * @param float $velocity
     */
    public function setVelocity(float $velocity): void;
}
