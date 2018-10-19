<?php
declare(strict_types=1);

namespace Havoc\Engine\WorldPoint;

use Havoc\Engine\Coordinates\CoordinatesInterface;

/**
 * Havoc Core world point interface.
 *
 * This interface allows objects to be placed on the world grid.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
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
     * @return CoordinatesInterface
     */
    public function getCoordinates(): CoordinatesInterface;
    
    /**
     * Sets coordinates.
     *
     * @param CoordinatesInterface $coordinates
     */
    public function setCoordinates(CoordinatesInterface $coordinates): void;
}
