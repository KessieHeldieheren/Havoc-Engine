<?php
declare(strict_types=1);

namespace Havoc\Engine\WorldPoint;

use Havoc\Engine\Config\DefaultConfig;
use Havoc\Engine\Coordinates\CoordinatesInterface;

/**
 * Havoc Engine empty world point.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class EmptyWorldPoint implements WorldPointInterface
{
    /**
     * World point display icon.
     *
     * @var string
     */
    private $icon = DefaultConfig::WORLD_POINT_NORMAL_ICON;
    
    /**
     * Entity coordinates.
     *
     * @var CoordinatesInterface
     */
    private $coordinates;
    
    /**
     * EmptyWorldPoint constructor method.
     *
     * @param string $icon
     */
    public function __construct(string $icon)
    {
        $this->setIcon($icon);
    }
    
    /**
     * Returns display icon.
     *
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }
    
    /**
     * Sets display icon.
     *
     * @param string $icon
     */
    public function setIcon(string $icon): void
    {
        $this->icon = $icon;
    }
    
    /**
     * Returns coordinates.
     *
     * @return CoordinatesInterface
     */
    public function getCoordinates(): CoordinatesInterface
    {
        return $this->coordinates;
    }
    
    /**
     * Sets coordinates.
     *
     * @param CoordinatesInterface $coordinates
     */
    public function setCoordinates(CoordinatesInterface $coordinates): void
    {
        $this->coordinates = $coordinates;
    }
}
