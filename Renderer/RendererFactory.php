<?php
declare(strict_types=1);

namespace Havoc\Engine\Renderer;

use Havoc\Engine\Config\ConfigControllerInterface;

use Havoc\Engine\Grid\GridInterface;
use Havoc\Engine\Render\RenderInterface;
use ReflectionClass;

/**
 * Havoc Engine world renderer factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
abstract class RendererFactory
{
    /**
     * Create a new renderwe.
     *
     * @param ConfigControllerInterface $config_controller
     * @param GridInterface $grid
     * @param RenderInterface $render
     * @param string $renderer
     * @return RendererInterface
     * @throws \ReflectionException
     */
    public static function new(ConfigControllerInterface $config_controller, GridInterface $grid, RenderInterface $render, string $renderer): RendererInterface
    {
        $reflects = (new ReflectionClass($renderer))->implementsInterface(RendererInterface::class);
        
        if (false === $reflects) {
            throw RendererException::rendererBadClass($renderer);
        }
        
        return new $renderer($config_controller, $grid, $render);
    }
}
