<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\Units\Radians;

/**
 * Havoc Engine entity translation unit radians.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class Radians implements RadiansInterface
{
    /**
     * Radians.
     *
     * @var float
     */
    private $radians;
    
    /**
     * Radians constructor method.
     *
     * @param float $radians
     */
    public function __construct(float $radians)
    {
        $this->setRadians($radians);
    }
    
    /**
     * Returns radians.
     *
     * @return float
     */
    public function getRadians(): float
    {
        return $this->radians;
    }
    
    /**
     * Sets radians.
     *
     * @param float $radians
     */
    public function setRadians(float $radians): void
    {
        $this->radians = $radians;
    }
}
