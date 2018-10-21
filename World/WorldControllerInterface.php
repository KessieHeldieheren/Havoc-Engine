<?php
declare(strict_types=1);

namespace Havoc\Engine\World;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Grid\Standard\GridSupervisorInterface;
use Havoc\Engine\Render\RenderInterface;

/**
 * Havoc Engine world controller interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface WorldControllerInterface
{
    /**
     * WorldController constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     */
    public function __construct(ConfigControllerInterface $config_controller);
    
    /**
     * Returns grid.
     *
     * @return GridSupervisorInterface
     */
    public function getGridSupervisor(): GridSupervisorInterface;
    
    /**
     * Sets grid.
     *
     * @param GridSupervisorInterface $grid
     */
    public function setGridSupervisor(GridSupervisorInterface $grid): void;
    
    /**
     * Returns render.
     *
     * @return RenderInterface
     */
    public function getRender(): RenderInterface;
    
    /**
     * Sets render.
     *
     * @param RenderInterface $render
     */
    public function setRender(RenderInterface $render): void;
    
    /**
     * Assign a new grid.
     *
     * @param string $dependency
     */
    public function assignNewGrid(string $dependency): void;
    
    /**
     * Assign a new render.
     *
     * @param string $dependency
     * @throws \ReflectionException
     */
    public function assignNewRender(string $dependency): void;
    
    /**
     * Assign a new renderer.
     *
     * @param string $dependency
     */
    public function assignNewRenderer(string $dependency): void;
}
