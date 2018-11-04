<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\Velocity;

/**
 * Havoc Engine entity translation velocity.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class Velocity implements VelocityInterface
{
    /**
     * Velocity.
     *
     * @var float
     */
    private $velocity;
    
    /**
     * Maximum velocity.
     *
     * @var float
     */
    private $max_velocity;
    
    /**
     * Velocity constructor method.
     *
     * @param float $velocity
     */
    public function __construct(float $velocity)
    {
        $this->setVelocity($velocity);
    }
    
    /**
     * Returns velocity.
     *
     * @return float
     */
    public function getVelocity(): float
    {
        return $this->velocity;
    }
    
    /**
     * Sets velocity.
     *
     * @param float $velocity
     */
    public function setVelocity(float $velocity): void
    {
        $this->velocity = $velocity;
    }
}
