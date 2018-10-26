<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid\GridView;

use Havoc\Engine\Config\ConfigControllerInterface;

/**
 * Havoc Engine grid view factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class GridViewFactory
{
    /**
     * Create a new grid vew.
     *
     * @param ConfigControllerInterface $config_controller
     * @return GridViewInterface
     */
    public static function new(ConfigControllerInterface $config_controller): GridViewInterface
    {
        return new GridView($config_controller);
    }
}
