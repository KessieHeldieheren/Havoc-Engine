<?php
declare(strict_types=1);

namespace Havoc\Engine\RendererCli;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Grid\GridInterface;
use Havoc\Engine\Render\RenderInterface;
use Havoc\Engine\Renderer\RendererInterface;

/**
 * Havoc Engine CLI renderer.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class RendererCli implements RendererInterface
{
    /**
     * Configuration controller.
     *
     * @var ConfigControllerInterface
     */
    private $config_controller;
    
    /**
     * World grid.
     *
     * @var GridInterface
     */
    private $grid;
    
    /**
     * World render.
     *
     * @var RenderInterface
     */
    private $render;
    
    /**
     * RendererCli constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     * @param GridInterface $grid
     * @param RenderInterface $render
     */
    public function __construct(ConfigControllerInterface $config_controller, GridInterface $grid, RenderInterface $render)
    {
        $this->setConfigController($config_controller);
        $this->setGrid($grid);
        $this->setRender($render);
    }
    
    /**
     * Render the world as a string.
     *
     * @return string
     */
    public function render(): string
    {
        # TODO THIS.
    }
    
    /**
     * Returns config_controller.
     *
     * @return ConfigControllerInterface
     */
    public function getConfigController(): ConfigControllerInterface
    {
        return $this->config_controller;
    }
    
    /**
     * Sets config_controller.
     *
     * @param ConfigControllerInterface $config_controller
     */
    public function setConfigController(ConfigControllerInterface $config_controller): void
    {
        $this->config_controller = $config_controller;
    }
    
    /**
     * Returns grid.
     *
     * @return GridInterface
     */
    public function getGrid(): GridInterface
    {
        return $this->grid;
    }
    
    /**
     * Sets grid.
     *
     * @param GridInterface $grid
     */
    public function setGrid(GridInterface $grid): void
    {
        $this->grid = $grid;
    }
    
    /**
     * Returns render.
     *
     * @return RenderInterface
     */
    public function getRender(): RenderInterface
    {
        return $this->render;
    }
    
    /**
     * Sets render.
     *
     * @param RenderInterface $render
     */
    public function setRender(RenderInterface $render): void
    {
        $this->render = $render;
    }
}
