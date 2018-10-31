<?php
declare(strict_types=1);

namespace Havoc\Engine\WorldPoint;

use Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface;

/**
 * Havoc Engine world point interface.
 *
 * This interface allows objects to be placed on the world grid.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface WorldPointInterface
{
    /**
     * Returns display icon.
     *
     * @return string
     */
    public function getIcon(): string;
    
    /**
     * Sets display icon.
     *
     * @param string $display
     */
    public function setIcon(string $display): void;
    
    /**
     * Returns coordinates.
     *
     * @return CartesianCoordinatesInterface
     */
    public function getCoordinates(): CartesianCoordinatesInterface;
    
    /**
     * Sets coordinates.
     *
     * @param \Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface $coordinates
     */
    public function setCoordinates(CartesianCoordinatesInterface $coordinates): void;
}
