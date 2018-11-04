<?php
declare(strict_types=1);

namespace Havoc\Engine\Renderer;

use Havoc\Engine\Config\ConfigControllerInterface;

use Havoc\Engine\Grid\GridSupervisor\GridSupervisorInterface;
use Havoc\Engine\Grid\GridView\GridViewInterface;
use Havoc\Engine\Render\RenderInterface;
use ReflectionClass;

/**
 * Havoc Engine world renderer factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class RendererFactory
{
    /**
     * Create a new renderwe.
     *
     * @param ConfigControllerInterface $config_controller
     * @param GridSupervisorInterface $grid
     * @param RenderInterface $render
     * @param GridViewInterface $grid_view
     * @param string $renderer
     * @return RendererInterface
     * @throws \ReflectionException
     */
    public static function new(ConfigControllerInterface $config_controller, GridSupervisorInterface $grid, RenderInterface $render, GridViewInterface $grid_view, string $renderer = Renderer::class): RendererInterface
    {
        $reflects = (new ReflectionClass($renderer))->implementsInterface(RendererInterface::class);
        
        if ($reflects === false) {
            throw RendererException::rendererBadClass($renderer);
        }
        
        return new $renderer($config_controller, $grid, $render, $grid_view);
    }
}
