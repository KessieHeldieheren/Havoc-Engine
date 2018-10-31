<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\Units\Degrees;

/**
 * Havoc Engine entity translation unit degrees interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface DegreesInterface
{
    /**
     * Degrees constructor method.
     *
     * @param float $degrees
     */
    public function __construct(float $degrees);
    
    /**
     * Sets degrees.
     *
     * @param float $degrees
     */
    public function setDegrees(float $degrees): void;
    
    /**
     * Returns degrees.
     *
     * @return float
     */
    public function getDegrees(): float;
}