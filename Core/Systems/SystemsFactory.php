<?php
declare(strict_types=1);

namespace Havoc\Engine\Core\Systems;

/**
 * Havoc Core systems factory.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
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
