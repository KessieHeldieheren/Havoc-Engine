<?php
declare(strict_types=1);

namespace Havoc\Engine\Renderer\SmallRenderer;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Grid\GridSupervisor\GridSupervisorInterface;
use Havoc\Engine\Render\RenderInterface;
use Havoc\Engine\Renderer\RendererInterface;

/**
 * Havoc Engine CLI renderer.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class SmallRenderer implements RendererInterface
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
    private $gridgrid_supervisor;
    
    /**
     * World render.
     *
     * @var RenderInterface
     */
    private $render;
    
    /**
     * Rendered grid lines.
     *
     * @var string[]
     */
    private $grid_lines = [];
    
    /**
     * RendererCli constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     * @param GridSupervisorInterface $grid
     * @param RenderInterface $render
     */
    public function __construct(ConfigControllerInterface $config_controller, GridSupervisorInterface $grid, RenderInterface $render)
    {
        $this->setConfigController($config_controller);
        $this->setGridgridsupervisor($grid);
        $this->setRender($render);
    }
    
    /**
     * Render the world as a string.
     *
     * @return void
     */
    public function render(): void
    {
        $this->renderXCoordinates();
        $this->renderHorizontalBar();
        $this->renderGrid();
        $this->renderHorizontalBar();
        $this->renderXCoordinates();
    }
    
    /**
     * Render the grid.
     */
    protected function renderGrid(): void
    {
        $config = $this->getConfigController();
        $x_grid = $config->getXView();
        $grid_supervisor = $this->getGridgridsupervisor();
        $render = $this->getRender();
        $i = 0;
        $composition = "";
        
        foreach ($grid_supervisor->getGrid() as $point) {
            if ($i % $x_grid === 0 && $i !== 0) {
                if ($config->isCoordinatesGuideVisible() === false) {
                    $composition .= PHP_EOL;
                }
                
                $this->addGridLine($composition);
    
                $composition = "";
            }
    
            $composition .= " {$point->getIcon()} ";
            $i++;
        }
        
        $this->renderYCoordinates();
        $render->append($this->getGridLinesAsString(), false);
    }
    
    /**
     * Render Y coordinates bar.
     *
     * @return void
     */
    protected function renderYCoordinates(): void
    {
        $config = $this->getConfigController();
    
        if ($config->isCoordinatesGuideVisible() === false) {
            return;
        }
        
        $vertical_bar_character = $config->getRenderVerticalBarCharacter();
        $i = 1;
        $grid_lines = $this->getGridLines();
        $result = [];
        
        foreach ($grid_lines as $grid_line) {
            if ($i > 9) {
                $result[] = sprintf(
                    "%s%s%s%s%s" . PHP_EOL,
                    $i,
                    $vertical_bar_character,
                    $grid_line,
                    $vertical_bar_character,
                    $i
                );
                
                $i++;
                
                continue;
            }
    
            $result[] = sprintf(
                " %s%s%s%s%s" . PHP_EOL,
                $i,
                $vertical_bar_character,
                $grid_line,
                $vertical_bar_character,
                $i
            );
            
            $i++;
        }
        
        $this->setGridLines($result);
    }
    
    /**
     * Render X coordinates bar.
     */
    protected function renderXCoordinates(): void
    {
        $config = $this->getConfigController();
        
        if ($config->isCoordinatesGuideVisible() === false) {
            return;
        }
        
        $x_grid = $config->getXView();
        $composition = "";
        
        for ($i = 1; $i <= $x_grid; $i++) {
            if ($i > 9) {
                $composition .= sprintf(" %s", $i);
                
                continue;
            }
            
            $composition .= sprintf(" %s ", $i);
        }
        
        $this->renderPadding();
        $this->getRender()->append($composition);
    }
    
    /**
     * Render horizontal bar.
     */
    protected function renderHorizontalBar(): void
    {
        $config = $this->getConfigController();
        $horizontal_bar_character = $config->getRenderHorizontalBarCharacter();
        $x_grid = $config->getXView();
        $composition = str_repeat($horizontal_bar_character, $x_grid * 3);
        
        $this->renderPadding();
        $this->getRender()->append($composition);
    }
    
    /**
     * Render horizontal padding.
     */
    protected function renderPadding(): void
    {
        $append = "   ";
        
        if ($this->getConfigController()->isCoordinatesGuideVisible() === false) {
            $append = "";
        }
        
        $this->getRender()->append($append, false);
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
    public function getGridgridsupervisor(): GridSupervisorInterface
    {
        return $this->gridgrid_supervisor;
    }
    
    /**
     * Sets grid.
     *
     * @param GridSupervisorInterface $gridgrid_supervisor
     */
    public function setGridgridsupervisor(GridSupervisorInterface $gridgrid_supervisor): void
    {
        $this->gridgrid_supervisor = $gridgrid_supervisor;
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
     * Returns grid_render_lines.
     *
     * @return string[]
     */
    protected function getGridLines(): array
    {
        return $this->grid_lines;
    }
    
    /**
     * Wipe the grid lines list.
     */
    protected function wipeGridLines(): void
    {
        $this->grid_lines = [];
    }
    
    /**
     * Returns grid render lines as a string.
     *
     * @return string
     */
    protected function getGridLinesAsString(): string
    {
        return implode("", $this->grid_lines);
    }
    
    /**
     * Add a grid render line.
     *
     * @param string $line
     */
    protected function addGridLine(string $line): void
    {
        $this->grid_lines[] = $line;
    }
    
    /**
     * Sets grid_lines.
     *
     * @param string[] $grid_lines
     */
    protected function setGridLines(array $grid_lines): void
    {
        $this->grid_lines = $grid_lines;
    }
}
