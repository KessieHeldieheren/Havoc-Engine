<?php
declare(strict_types=1);

namespace Havoc\Engine\Save\SaveController;

use Havoc\Engine\Save\SaveException;

/**
 * Havoc Engine save controller factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class SaveControllerFactory
{
    public static function new(string $class_name = SaveController::class): SaveControllerInterface
    {
        $reflects = (new \ReflectionClass($class_name))->implementsInterface(SaveControllerInterface::class);
        
        if ($reflects === false) {
            throw SaveException::saveControllerBadClass($class_name);
        }
        
        return new $class_name();
    }
}
