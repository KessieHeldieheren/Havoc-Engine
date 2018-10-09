<?php
declare(strict_types=1);

namespace Havoc\Engine\Render;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Exceptions\FactoryException;
use ReflectionClass;

/**
 * Havoc Engine world render factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
abstract class RenderFactory
{
    /**
     * Create a new render.
     *
     * @param ConfigControllerInterface $config_controller
     * @param string $render
     * @return RenderInterface
     * @throws \ReflectionException
     */
    public static function new(ConfigControllerInterface $config_controller, string $render = Render::class): RenderInterface
    {
        $reflects = (new ReflectionClass($render))->implementsInterface(RenderInterface::class);
    
        if (false === $reflects) {
            throw FactoryException::configControllerBadClass($render);
        }
        
        return new $render($config_controller);
    }
}
