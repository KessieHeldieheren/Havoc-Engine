<?php
declare(strict_types=1);

namespace Havoc\Engine\Renderer;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Grid\GridSupervisor\GridSupervisorInterface;
use Havoc\Engine\Grid\GridView\GridViewInterface;
use Havoc\Engine\Render\RenderInterface;

/**
 * Havoc Engine CLI renderer.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class Renderer implements RendererInterface
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
     * Grid view.
     *
     * @var GridViewInterface
     */
    private $grid_view;
    
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
     * @param GridViewInterface $grid_view
     */
    public function __construct(ConfigControllerInterface $config_controller, GridSupervisorInterface $grid, RenderInterface $render, GridViewInterface $grid_view)
    {
        $this->setConfigController($config_controller);
        $this->setGridgridSupervisor($grid);
        $this->setRender($render);
        $this->setGridView($grid_view);
    }
    
    /**
     * Render the world as a string.
     *
     * @return void
     */
    public function render(): void
    {
        $this->clear();
        $this->renderXCoordinates();
        $this->renderHorizontalBar();
        $this->renderGrid();
        $this->renderHorizontalBar();
        $this->renderXCoordinates();
    }
    
    /**
     * Clear the render and grid lines in order to render the next world view.
     */
    protected function clear(): void
    {
        $this->getRender()->clear();
        $this->setGridLines([]);
    }
    
    /**
     * Render the grid.
     */
    protected function renderGrid(): void
    {
        $config = $this->getConfigController();
        $x_width = $this->getGridView()->getXView();
        $grid_supervisor = $this->getGridgridSupervisor();
        $render = $this->getRender();
        $i = 0;
        $composition = "";
        
        foreach ($grid_supervisor->getGrid() as $point) {
            if ($i % $x_width === 0 && $i !== 0) {
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
        $grid_lines = $this->getGridLines();
        $grid_view = $this->getGridView();
        $result = [];
        $i = $grid_view->getLowestY() - $grid_view->getCenterCoordinates()->getY();
    
        foreach ($grid_lines as $grid_line) {
            if ($i % 2 !== 0) {
                $result[] = sprintf(
                    "   %s%s%s" . PHP_EOL,
                    $vertical_bar_character,
                    $grid_line,
                    $vertical_bar_character
                );
            } elseif ($i < -9) {
                $result[] = sprintf(
                    "%s%s%s%s%s" . PHP_EOL,
                    $i,
                    $vertical_bar_character,
                    $grid_line,
                    $vertical_bar_character,
                    $i
                );
            } elseif ($i < 0) {
                $result[] = sprintf(
                    " %s%s%s%s%s" . PHP_EOL,
                    $i,
                    $vertical_bar_character,
                    $grid_line,
                    $vertical_bar_character,
                    $i
                );
            } elseif ($i >= 0 && $i < 10) {
                $result[] = sprintf(
                    "  %s%s%s%s%s" . PHP_EOL,
                    $i,
                    $vertical_bar_character,
                    $grid_line,
                    $vertical_bar_character,
                    $i
                );
            } elseif ($i > 9) {
                $result[] = sprintf(
                    " %s%s%s%s%s" . PHP_EOL,
                    $i,
                    $vertical_bar_character,
                    $grid_line,
                    $vertical_bar_character,
                    $i
                );
            }
            
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
    
        $grid_view = $this->getGridView();
        $highest_x = $grid_view->getHighestX() - $grid_view->getCenterCoordinates()->getX();
        $composition = "";
        $i = $grid_view->getLowestX() - $grid_view->getCenterCoordinates()->getX();
        
        for (; $i <= $highest_x; $i++) {
            if ($i % 2 !== 0 && $i !== 0) {
                $composition .= "   ";
            } elseif ($i < -9) {
                $composition .= sprintf("%s", $i);
            } elseif ($i < 0) {
                $composition .= sprintf("%s ", $i);
            } elseif ($i >= 0 && $i < 10) {
                $composition .= sprintf(" %s ", $i);
            } elseif ($i > 9) {
                $composition .= sprintf("%s ", $i);
            }
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
        $x_width = $this->getGridView()->getXView();
        $composition = str_repeat($horizontal_bar_character, $x_width * 3);
        
        $this->renderPadding();
        $this->getRender()->append($composition);
    }
    
    /**
     * Render horizontal padding.
     */
    protected function renderPadding(): void
    {
        $append = "    ";
        
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
    public function getGridgridSupervisor(): GridSupervisorInterface
    {
        return $this->grid_supervisor;
    }
    
    /**
     * Sets grid.
     *
     * @param GridSupervisorInterface $grid_supervisor
     */
    public function setGridgridSupervisor(GridSupervisorInterface $grid_supervisor): void
    {
        $this->grid_supervisor = $grid_supervisor;
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
     * Returns grid_view.
     *
     * @return GridViewInterface
     */
    protected function getGridView(): GridViewInterface
    {
        return $this->grid_view;
    }
    
    /**
     * Sets grid_view.
     *
     * @param GridViewInterface $grid_view
     */
    protected function setGridView(GridViewInterface $grid_view): void
    {
        $this->grid_view = $grid_view;
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
