<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation;

use Havoc\Engine\Entity\Translation\Acceleration\AccelerationFactory;
use Havoc\Engine\Entity\Translation\Acceleration\AccelerationInterface;
use Havoc\Engine\Entity\Translation\Duration\DurationFactory;
use Havoc\Engine\Entity\Translation\Duration\DurationInterface;
use Havoc\Engine\Entity\Translation\Heading\HeadingFactory;
use Havoc\Engine\Entity\Translation\Heading\HeadingInterface;
use Havoc\Engine\Entity\Translation\Velocity\VelocityFactory;
use Havoc\Engine\Entity\Translation\Velocity\VelocityInterface;

/**
 * Havoc Engine entity translation.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class Translation
{
    /**
     * Translation velocity
     *
     * @var VelocityInterface
     */
    private $velocity;
    
    /**
     * Translation heading.
     *
     * @var HeadingInterface
     */
    private $heading;
    
    /**
     * Translation acceleration.
     *
     * @var AccelerationInterface
     */
    private $acceleration;
    
    /**
     * Translation duration.
     *
     * @var DurationInterface
     */
    private $duration;
    
    /**
     * Translation constructor method.
     *
     * @param float $velocity
     * @param int $heading
     * @param int $duration
     * @param float $acceleration
     */
    public function __construct(float $velocity, int $heading, int $duration = 1, float $acceleration = 0)
    {
        $this->setVelocity(VelocityFactory::new($velocity));
        $this->setDuration(DurationFactory::new($duration));
        $this->setHeading(HeadingFactory::new($heading));
        
        $this->setAcceleration(
            AccelerationFactory::new($this->getVelocity(), $acceleration)
        );
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
     * Returns heading.
     *
     * @return HeadingInterface
     */
    public function getHeading(): HeadingInterface
    {
        return $this->heading;
    }
    
    /**
     * Sets heading.
     *
     * @param HeadingInterface $heading
     */
    public function setHeading(HeadingInterface $heading): void
    {
        $this->heading = $heading;
    }
    
    /**
     * Returns acceleration.
     *
     * @return AccelerationInterface
     */
    public function getAcceleration(): AccelerationInterface
    {
        return $this->acceleration;
    }
    
    /**
     * Sets acceleration.
     *
     * @param AccelerationInterface $acceleration
     */
    public function setAcceleration(AccelerationInterface $acceleration): void
    {
        $this->acceleration = $acceleration;
    }
    
    /**
     * Returns duration.
     *
     * @return DurationInterface
     */
    public function getDuration(): DurationInterface
    {
        return $this->duration;
    }
    
    /**
     * Sets duration.
     *
     * @param DurationInterface $duration
     */
    public function setDuration(DurationInterface $duration): void
    {
        $this->duration = $duration;
    }
}
