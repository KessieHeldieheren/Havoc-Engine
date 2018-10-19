<?php
declare(strict_types=1);

namespace Havoc\Engine\World;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Grid\Standard\GridSupervisorFactory;
use Havoc\Engine\Grid\Standard\GridSupervisorInterface;
use Havoc\Engine\Render\RenderFactory;
use Havoc\Engine\Render\RenderInterface;
use Havoc\Engine\Renderer\RendererFactory;
use Havoc\Engine\Renderer\RendererInterface;

/**
 * Havoc Core world controller.
 *
 * @package Havoc-Core
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
     * @var GridSupervisorInterface
     */
    private $grid_supervisor;
    
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
     */
    public function __construct(ConfigControllerInterface $config_controller)
    {
        $this->setConfigController($config_controller);
        $this->bootstrap();
    }
    
    /**
     * Bootstrap default dependencies.
     */
    protected function bootstrap(): void
    {
        $this->setGridSupervisor(
            GridSupervisorFactory::new($this->getConfigController())
        );
    
        $this->setRender(
            RenderFactory::new($this->getConfigController())
        );
    
        $this->setRenderer(
            RendererFactory::new(
                $this->getConfigController(),
                $this->getGridSupervisor(),
                $this->getRender()
            )
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
     * @return GridSupervisorInterface
     */
    public function getGridSupervisor(): GridSupervisorInterface
    {
        return $this->grid_supervisor;
    }
    
    /**
     * Sets grid.
     *
     * @param GridSupervisorInterface $grid_supervisor
     */
    public function setGridSupervisor(GridSupervisorInterface $grid_supervisor): void
    {
        $this->grid_supervisor = $grid_supervisor;
    }
    
    /**
     * Assign a new grid.
     *
     * @param string $dependency
     */
    public function assignNewGrid(string $dependency): void
    {
        $this->setGridSupervisor(
            GridSupervisorFactory::new(
                $this->getConfigController(),
                $dependency
            )
        );
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
     * Assign a new render.
     *
     * @param string $dependency
     * @throws \ReflectionException
     */
    public function assignNewRender(string $dependency): void
    {
        $this->setRender(
            RenderFactory::new(
                $this->getConfigController(),
                $dependency
            )
        );
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
    
    /**
     * Assign a new renderer.
     *
     * @param string $dependency
     */
    public function assignNewRenderer(string $dependency): void
    {
        $this->setRenderer(
            RendererFactory::new(
                $this->getConfigController(),
                $this->getGridSupervisor(),
                $this->getRender(),
                $dependency
            )
        );
    }
}
