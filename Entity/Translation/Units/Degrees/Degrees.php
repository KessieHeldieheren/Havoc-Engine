<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\Units\Degrees;

/**
 * Havoc Engine entity translation unit degrees.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class Degrees implements DegreesInterface
{
    /**
     * Degrees.
     *
     * @var float
     */
    private $degrees;
    
    /**
     * Degrees constructor method.
     *
     * @param float $degrees
     */
    public function __construct(float $degrees)
    {
        $this->setDegrees($degrees);
    }
    
    /**
     * Returns degrees.
     *
     * @return float
     */
    public function getDegrees(): float
    {
        return $this->degrees;
    }
    
    /**
     * Sets degrees.
     *
     * @param float $degrees
     */
    public function setDegrees(float $degrees): void
    {
        $this->degrees = $degrees;
    }
}
