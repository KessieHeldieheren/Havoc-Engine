<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary;

use Havoc\Engine\Config\ConfigControllerInterface;

/**
 * Havoc Engine grid boundary factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class BoundaryFactory
{
    /**
     * Create a new boundary.
     *
     * @param ConfigControllerInterface $config_controller
     * @return BoundaryInterface
     */
    public static function new(ConfigControllerInterface $config_controller): BoundaryInterface
    {
        return new Boundary($config_controller);
    }
}
