<?php
declare(strict_types=1);

namespace Havoc\Engine\Config;

/**
 * Havoc Engine config controller interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface ConfigControllerInterface
{
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
    
    /**
     * Returns world_point_out_of_bounds_icon.
     *
     * @return string
     */
    public function getWorldPointOutOfBoundsIcon(): string;
    
    /**
     * Sets world_point_out_of_bounds_icon.
     *
     * @param string $world_point_out_of_bounds_icon
     */
    public function setWorldPointOutOfBoundsIcon(string $world_point_out_of_bounds_icon): void;
}
