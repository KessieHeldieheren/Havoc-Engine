<?php
declare(strict_types=1);

namespace Havoc\Engine\Config;

/**
 * Havoc Core config controller interface.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
interface ConfigControllerInterface
{
    /**
     * Returns x_grid.
     *
     * @return int
     */
    public function getXGrid(): int;
    
    /**
     * Sets x_grid.
     *
     * @param int $x_grid
     */
    public function setXGrid(int $x_grid): void;
    
    /**
     * Returns y_grid.
     *
     * @return int
     */
    public function getYGrid(): int;
    
    /**
     * Sets y_grid.
     *
     * @param int $y_grid
     */
    public function setYGrid(int $y_grid): void;
    
    /**
     * Returns coordinates_format.
     *
     * @return string
     */
    public function getCoordinatesFormat(): string;
    
    /**
     * Sets coordinates_format.
     *
     * @param string $coordinates_format
     */
    public function setCoordinatesFormat(string $coordinates_format): void;
    
    /**
     * Returns display_coordinates.
     *
     * @return bool
     */
    public function isCoordinatesGuideVisible(): bool;
    
    /**
     * Sets display_coordinates.
     *
     * @param bool $display_coordinates
     */
    public function setCoordinatesGuideVisible(bool $display_coordinates): void;
    
    /**
     * Returns world_point_normal_icon.
     *
     * @return string
     */
    public function getWorldPointNormalIcon(): string;
    
    /**
     * Sets world_point_normal_icon.
     *
     * @param string $world_point_normal_icon
     */
    public function setWorldPointNormalIcon(string $world_point_normal_icon): void;
    
    /**
     * Returns world_point_alternate_icon.
     *
     * @return string
     */
    public function getWorldPointAlternateIcon(): string;
    
    /**
     * Sets world_point_alternate_icon.
     *
     * @param string $world_point_alternate_icon
     */
    public function setWorldPointAlternateIcon(string $world_point_alternate_icon): void;
    
    /**
     * Returns render_horizontal_bar_character.
     *
     * @return string
     */
    public function getRenderHorizontalBarCharacter(): string;
    
    /**
     * Sets render_horizontal_bar_character.
     *
     * @param string $render_horizontal_bar_character
     */
    public function setRenderHorizontalBarCharacter(string $render_horizontal_bar_character): void;
    
    /**
     * Returns render_vertical_bar_character.
     *
     * @return string
     */
    public function getRenderVerticalBarCharacter(): string;
    
    /**
     * Sets render_vertical_bar_character.
     *
     * @param string $render_vertical_bar_character
     */
    public function setRenderVerticalBarCharacter(string $render_vertical_bar_character): void;
}
