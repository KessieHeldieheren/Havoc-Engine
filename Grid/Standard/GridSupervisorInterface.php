<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid\Standard;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Entity\Boundary\BoundaryInterface;
use Havoc\Engine\WorldPoint\WorldPointInterface;

/**
 * Havoc Engine grid supervisor interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface GridSupervisorInterface
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
     * @param CoordinatesInterface $coordinates
     */
    public function insertWithCoordinates(WorldPointInterface $world_point, CoordinatesInterface $coordinates): void;
    
    /**
     * Insert empty points into the grid.
     */
    public function insertEmptyPoints(): void;
    
    /**
     * Returns the boundaries for the world grid.
     *
     * @return \Havoc\Engine\Entity\Boundary\BoundaryInterface
     */
    public function getBoundary(): BoundaryInterface;
}
