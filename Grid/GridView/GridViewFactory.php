<?php
declare(strict_types=1);

namespace Havoc\Engine\Grid\GridView;

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
     * @return GridViewInterface
     */
    public static function new(): GridViewInterface
    {
        return new GridView();
    }
}
