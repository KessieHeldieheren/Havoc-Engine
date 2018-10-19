<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid\Standard;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Grid\Boundary\BoundaryFactory;
use Havoc\Engine\Grid\Boundary\BoundaryInterface;
use Havoc\Engine\WorldPoint\WorldPointInterface;

/**
 * Havoc Core grid supervisor interface.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
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
     * @return BoundaryInterface
     */
    public function getBoundary(): BoundaryInterface;
}
