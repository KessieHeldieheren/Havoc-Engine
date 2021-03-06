<?php
declare(strict_types=1);

namespace Havoc\Engine\Renderer;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Grid\GridSupervisor\GridSupervisorInterface;
use Havoc\Engine\Render\RenderInterface;

/**
 * Havoc Engine world renderer interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
interface RendererInterface
{
    /**
     * RendererCli constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     * @param GridSupervisorInterface $grid
     * @param RenderInterface $render
     */
    public function __construct(ConfigControllerInterface $config_controller, GridSupervisorInterface $grid, RenderInterface $render);
    
    /**
     * Render the world as a string.
     *
     * @return void
     */
    public function render(): void;
}
