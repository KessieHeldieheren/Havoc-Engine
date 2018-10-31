<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\Heading;

use Havoc\Engine\Entity\Translation\VectorsHelper;

/**
 * Havoc Engine entity translation heading.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class Heading implements HeadingInterface
{
    /**
     * Translation heading.
     *
     * @var float
     */
    private $degrees;
    
    /**
     * Heading in radians.
     *
     * @var float
     */
    private $radians;
    
    /**
     * Heading constructor method.
     *
     * @param float $degrees
     */
    public function __construct(float $degrees)
    {
        $this->setDegrees($degrees);
        $this->setRadians(VectorsHelper::degreesToRadians($degrees));
    }
    
    /**
     * Returns heading.
     *
     * @return float
     */
    public function getDegrees(): float
    {
        return $this->degrees;
    }
    
    /**
     * Sets heading.
     *
     * @param float $degrees
     */
    public function setDegrees(float $degrees): void
    {
        $this->degrees = $degrees;
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
