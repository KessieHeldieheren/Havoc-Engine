<?php
declare(strict_types=1);

namespace Havoc\Engine\Core\Systems;

/**
 * Havoc Engine systems factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class SystemsFactory
{
    /**
     * Create new controllers.
     *
     * @return ControllersInterface
     */
    public static function newControllers(): ControllersInterface
    {
        return new Controllers();
    }
}
