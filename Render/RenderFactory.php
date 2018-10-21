<?php
declare(strict_types=1);

namespace Havoc\Engine\Render;

use Havoc\Engine\Config\ConfigControllerInterface;
use ReflectionClass;

/**
 * Havoc Engine world render factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
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
            throw RenderException::renderBadClass($render);
        }
        
        return new $render($config_controller);
    }
}
