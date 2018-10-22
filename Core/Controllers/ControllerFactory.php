<?php
declare(strict_types=1);

namespace Havoc\Engine\Core\Controllers;

/**
 * Havoc Engine systems factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class ControllerFactory
{
    /**
     * Create new controllers.
     *
     * @return ControllersInterface
     */
    public static function new(): ControllersInterface
    {
        return new Controllers();
    }
}
