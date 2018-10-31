<?php
declare(strict_types=1);

namespace Havoc\Engine\WorldPoint;

use Havoc\Engine\Config\DefaultConfig;
use Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface;

/**
 * Havoc Engine empty world point.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
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
     * @var CartesianCoordinatesInterface
     */
    private $coordinates;
    
    /**
     * EmptyWorldPoint constructor method.
     *
     * @param string $icon
     * @param CartesianCoordinatesInterface $coordinates
     */
    public function __construct(string $icon, CartesianCoordinatesInterface $coordinates)
    {
        $this->setIcon($icon);
        $this->setCoordinates($coordinates);
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
     * @return CartesianCoordinatesInterface
     */
    public function getCoordinates(): CartesianCoordinatesInterface
    {
        return $this->coordinates;
    }
    
    /**
     * Sets coordinates.
     *
     * @param CartesianCoordinatesInterface $coordinates
     */
    public function setCoordinates(CartesianCoordinatesInterface $coordinates): void
    {
        $this->coordinates = $coordinates;
    }
}
