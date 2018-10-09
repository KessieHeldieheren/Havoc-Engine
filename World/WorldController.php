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
use Havoc\Engine\Renderer\RendererInterface;
use Havoc\Engine\RendererCli\RendererCli;

/**
 * Havoc Engine world controller.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class WorldController implements WorldControllerInterface
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
     * Renderer.
     *
     * @var RendererInterface
     */
    private $renderer;
    
    /**
     * WorldController constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     * @param string $grid
     * @param string $render
     * @param string $renderer
     * @throws \ReflectionException
     */
    public function __construct(ConfigControllerInterface $config_controller, string $grid = Grid::class, string $render = Render::class, string $renderer = RendererCli::class)
    {
        $this->setConfigController($config_controller);
        
        $this->setGrid(
            GridFactory::new($this->getConfigController(), $grid)
        );
        
        $this->setRender(
            RenderFactory::new($this->getConfigController(), $render)
        );
        
        $this->setRenderer(
            RendererFactory::new($this->getConfigController(), $this->getGrid(), $this->getRender(), $renderer)
        );
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
    
    /**
     * Returns renderer.
     *
     * @return RendererInterface
     */
    public function getRenderer(): RendererInterface
    {
        return $this->renderer;
    }
    
    /**
     * Sets renderer.
     *
     * @param RendererInterface $renderer
     */
    public function setRenderer(RendererInterface $renderer): void
    {
        $this->renderer = $renderer;
    }
}
