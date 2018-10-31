<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\Heading;

/**
 * Havoc Engine entity translation heading interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface HeadingInterface
{
    /**
     * Heading constructor method.
     *
     * @param float $degrees
     */
    public function __construct(float $degrees);
    
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
    
    /**
     * Sets heading.
     *
     * @param float $degrees
     */
    public function setDegrees(float $degrees): void;
    
    /**
     * Returns heading.
     *
     * @return float
     */
    public function getDegrees(): float;
}
