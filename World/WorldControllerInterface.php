<?php
declare(strict_types=1);

namespace Havoc\Engine\World;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Grid\Grid;
use Havoc\Engine\Grid\GridFactory;
use Havoc\Engine\Grid\GridInterface;
use Havoc\Engine\Render\Render;
use Havoc\Engine\Render\RenderFactory;
use Havoc\Engine\Render\RenderInterface;
use Havoc\Engine\Renderer\RendererFactory;

/**
 * Havoc Engine world controller interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
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
     * @return GridInterface
     */
    public function getGrid(): GridInterface;
    
    /**
     * Sets grid.
     *
     * @param GridInterface $grid
     */
    public function setGrid(GridInterface $grid): void;
    
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
