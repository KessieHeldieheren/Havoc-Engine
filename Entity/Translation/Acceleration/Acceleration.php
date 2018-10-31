<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\Acceleration;

use Havoc\Engine\Entity\Translation\Velocity\VelocityInterface;

/**
 * Havoc Engine entity translation acceleration.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class Acceleration implements AccelerationInterface
{
    /**
     * Translation velocity.
     *
     * @var VelocityInterface
     */
    private $velocity;
    
    /**
     * Translation acceleration.
     *
     * @var float
     */
    private $acceleration;
    
    /**
     * Acceleration constructor method.
     *
     * @param VelocityInterface $velocity
     * @param float $acceleration
     */
    public function __construct(VelocityInterface $velocity, float $acceleration)
    {
        $this->setVelocity($velocity);
        $this->setAcceleration($acceleration);
    }
    
    /**
     * Increase velocity by acceleration amount.
     */
    public function incrementVelocity(): void
    {
        $velocity = $this->getVelocity();
        
        $velocity->setVelocity($this->getAcceleration() + $velocity->getVelocity());
    }
    
    /**
     * Returns velocity.
     *
     * @return VelocityInterface
     */
    public function getVelocity(): VelocityInterface
    {
        return $this->velocity;
    }
    
    /**
     * Sets velocity.
     *
     * @param VelocityInterface $velocity
     */
    public function setVelocity(VelocityInterface $velocity): void
    {
        $this->velocity = $velocity;
    }
    
    /**
     * Returns acceleration.
     *
     * @return float
     */
    public function getAcceleration(): float
    {
        return $this->acceleration;
    }
    
    /**
     * Sets acceleration.
     *
     * @param float $acceleration
     */
    public function setAcceleration(float $acceleration): void
    {
        $this->acceleration = $acceleration;
    }
}
