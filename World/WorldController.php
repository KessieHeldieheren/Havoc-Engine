<?php
declare(strict_types=1);

namespace Havoc\Engine\World;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Entity\Boundary\BoundaryFactory;
use Havoc\Engine\Entity\Boundary\BoundaryInterface;
use Havoc\Engine\Grid\GridSupervisor\GridSupervisorFactory;
use Havoc\Engine\Grid\GridSupervisor\GridSupervisorInterface;
use Havoc\Engine\Render\RenderFactory;
use Havoc\Engine\Render\RenderInterface;
use Havoc\Engine\Renderer\RendererFactory;
use Havoc\Engine\Renderer\RendererInterface;

/**
 * Havoc Engine world controller.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
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
     * Grid boundary.
     *
     * @var BoundaryInterface
     */
    private $grid_boundary;
    
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
        $config_controller = $this->getConfigController();
    
        $this->setGridBoundary(
            BoundaryFactory::new($config_controller)
        );
        
        $this->setGridSupervisor(
            GridSupervisorFactory::new($config_controller, $this->getGridBoundary())
        );
    
        $this->setRender(
            RenderFactory::new($config_controller)
        );
    
        $this->setRenderer(
            RendererFactory::new(
                $config_controller,
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
     * Returns grid_boundary.
     *
     * @return BoundaryInterface
     */
    public function getGridBoundary(): BoundaryInterface
    {
        return $this->grid_boundary;
    }
    
    /**
     * Sets grid_boundary.
     *
     * @param BoundaryInterface $grid_boundary
     */
    public function setGridBoundary(BoundaryInterface $grid_boundary): void
    {
        $this->grid_boundary = $grid_boundary;
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
