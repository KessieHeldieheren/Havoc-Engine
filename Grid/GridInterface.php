<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface;
use Havoc\Engine\WorldPoint\WorldPointInterface;

/**
  * Havoc Engine grid interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface GridInterface
{
    /**
     * Grid constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     */
    public function __construct(ConfigControllerInterface $config_controller);
    
    /**
     * Returns grid.
     *
     * @return WorldPointInterface[]
     */
    public function getGrid(): array;
    
    /**
     * Wipe grid.
     */
    public function wipeGrid(): void;
    
    /**
     * Splice world point onto grid.
     *
     * @param WorldPointInterface $world_point
     * @param \Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface $coordinates
     */
    public function insertWithCoordinates(WorldPointInterface $world_point, CartesianCoordinatesInterface $coordinates): void;
    
    /**
     * Insert empty points into the grid.
     */
    public function insertEmptyPoints(): void;
}
