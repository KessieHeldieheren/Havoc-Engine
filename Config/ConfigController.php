<?php
declare(strict_types=1);

namespace Havoc\Engine\Config;

/**
 * Havoc Engine configuration controller.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class ConfigController implements ConfigControllerInterface
{
    /**
     * Display coordinates on the world grid.
     *
     * @var bool
     */
    private $coordinates_guide_visible = DefaultConfig::WORLD_COORDINATES_GUIDE_VISIBLE;
    
    /**
     * World point normal display icon.
     *
     * @var string
     */
    private $world_point_normal_icon = DefaultConfig::WORLD_POINT_NORMAL_ICON;
    
    /**
     * World point alternate display icon.
     *
     * @var string
     */
    private $world_point_alternate_icon = DefaultConfig::WORLD_POINT_ALTERNATE_ICON;
    
    /**
     * World point out of bounds display icon.
     *
     * @var string
     */
    private $world_point_out_of_bounds_icon = DefaultConfig::WORLD_POINT_OUT_OF_BOUNDS_ICON;
    
    /**
     * World render horizontal grid bar.
     *
     * @var string
     */
    private $render_horizontal_bar_character = DefaultConfig::RENDER_HORIZONTAL_BAR_CHARACTER;
    
    /**
     * World render vertical grid bar.
     *
     * @var string
     */
    private $render_vertical_bar_character = DefaultConfig::RENDER_VERTICAL_BAR_CHARACTER;
    
    /**
     * Returns display_coordinates.
     *
     * @return bool
     */
    public function isCoordinatesGuideVisible(): bool
    {
        return $this->coordinates_guide_visible;
    }
    
    /**
     * Sets display_coordinates.
     *
     * @param bool $coordinates_guide_visible
     */
    public function setCoordinatesGuideVisible(bool $coordinates_guide_visible): void
    {
        $this->coordinates_guide_visible = $coordinates_guide_visible;
    }
    
    /**
     * Returns world_point_normal_icon.
     *
     * @return string
     */
    public function getWorldPointNormalIcon(): string
    {
        return $this->world_point_normal_icon;
    }
    
    /**
     * Sets world_point_normal_icon.
     *
     * @param string $world_point_normal_icon
     */
    public function setWorldPointNormalIcon(string $world_point_normal_icon): void
    {
        $this->world_point_normal_icon = $world_point_normal_icon;
    }
    
    /**
     * Returns world_point_alternate_icon.
     *
     * @return string
     */
    public function getWorldPointAlternateIcon(): string
    {
        return $this->world_point_alternate_icon;
    }
    
    /**
     * Sets world_point_alternate_icon.
     *
     * @param string $world_point_alternate_icon
     */
    public function setWorldPointAlternateIcon(string $world_point_alternate_icon): void
    {
        $this->world_point_alternate_icon = $world_point_alternate_icon;
    }
    
    /**
     * Returns world_point_out_of_bounds_icon.
     *
     * @return string
     */
    public function getWorldPointOutOfBoundsIcon(): string
    {
        return $this->world_point_out_of_bounds_icon;
    }
    
    /**
     * Sets world_point_out_of_bounds_icon.
     *
     * @param string $world_point_out_of_bounds_icon
     */
    public function setWorldPointOutOfBoundsIcon(string $world_point_out_of_bounds_icon): void
    {
        $this->world_point_out_of_bounds_icon = $world_point_out_of_bounds_icon;
    }
    
    /**
     * Returns render_horizontal_bar_character.
     *
     * @return string
     */
    public function getRenderHorizontalBarCharacter(): string
    {
        return $this->render_horizontal_bar_character;
    }
    
    /**
     * Sets render_horizontal_bar_character.
     *
     * @param string $render_horizontal_bar_character
     */
    public function setRenderHorizontalBarCharacter(string $render_horizontal_bar_character): void
    {
        $this->render_horizontal_bar_character = $render_horizontal_bar_character;
    }
    
    /**
     * Returns render_vertical_bar_character.
     *
     * @return string
     */
    public function getRenderVerticalBarCharacter(): string
    {
        return $this->render_vertical_bar_character;
    }
    
    /**
     * Sets render_vertical_bar_character.
     *
     * @param string $render_vertical_bar_character
     */
    public function setRenderVerticalBarCharacter(string $render_vertical_bar_character): void
    {
        $this->render_vertical_bar_character = $render_vertical_bar_character;
    }
}
