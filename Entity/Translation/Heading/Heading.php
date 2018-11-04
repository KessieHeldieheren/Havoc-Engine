<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\Heading;

use Havoc\Engine\Entity\Translation\Units\Degrees\DegreesInterface;
use Havoc\Engine\Entity\Translation\Units\Radians\RadiansInterface;
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
     * @var DegreesInterface
     */
    private $degrees;
    
    /**
     * Heading in radians.
     *
     * @var RadiansInterface
     */
    private $radians;
    
    /**
     * Maximum change in heading per tick.
     *
     * @var float
     */
    private $delta;
    
    /**
     * Heading constructor method.
     *
     * @param DegreesInterface $degrees
     */
    public function __construct(DegreesInterface $degrees)
    {
        $this->setDegrees($degrees);
        $this->setRadians(VectorsHelper::degreesToRadians($degrees));
    }
    
    /**
     * Returns degrees.
     *
     * @return DegreesInterface
     */
    public function getDegrees(): DegreesInterface
    {
        return $this->degrees;
    }
    
    /**
     * Sets degrees.
     *
     * @param DegreesInterface $degrees
     */
    public function setDegrees(DegreesInterface $degrees): void
    {
        $this->degrees = $degrees;
    }
    
    /**
     * Returns radians.
     *
     * @return RadiansInterface
     */
    public function getRadians(): RadiansInterface
    {
        return $this->radians;
    }
    
    /**
     * Sets radians.
     *
     * @param RadiansInterface $radians
     */
    public function setRadians(RadiansInterface $radians): void
    {
        $this->radians = $radians;
    }
    
    /**
     * Returns delta.
     *
     * @return float
     */
    public function getDelta(): float
    {
        return $this->delta;
    }
    
    /**
     * Sets delta.
     *
     * @param float $delta
     */
    public function setDelta(float $delta): void
    {
        $this->delta = $delta;
    }
}
