<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\Units\Radians;

/**
 * Havoc Engine entity translation unit radians interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface RadiansInterface
{
    /**
     * Radians constructor method.
     *
     * @param float $radians
     */
    public function __construct(float $radians);
    
    /**
     * Returns radians.
     *
     * @return float
     */
    public function getRadians(): float;
    
    /**
     * Sets radians.
     *
     * @param float $radians
     */
    public function setRadians(float $radians): void;
}
