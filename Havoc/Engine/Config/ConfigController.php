<?php
declare(strict_types=1);

namespace Havoc\Engine\Config;

use Havoc\Engine\System\Property;
use Havoc\Engine\Exceptions\ConfigException;

/**
 * Havoc Engine configuration controller.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class ConfigController implements ConfigControllerInterface
{
    /**
     * World grid default X axis length.
     *
     * @var int
     */
    private $x_grid = DefaultConfig::WORLD_DEFAULT_X;
    
    /**
     * World grid default Y axis length.
     *
     * @var int
     */
    private $y_grid = DefaultConfig::WORLD_DEFAULT_Y;
    
    /**
     * Coordinates string format.
     *
     * @var string
     */
    private $coordinates_format = DefaultConfig::COORDINATES_FORMAT;
    
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
     * Returns x_grid.
     *
     * @return int
     */
    public function getXGrid(): int
    {
        return $this->x_grid;
    }
    
    /**
     * Sets x_grid.
     *
     * @param int $x_grid
     */
    public function setXGrid(int $x_grid): void
    {
        if ($x_grid > Property::X_GRID_MAX) {
            throw ConfigException::xGridOverMax($x_grid);
        }
    
        if ($x_grid < Property::X_GRID_MIN) {
            throw ConfigException::xGridUnderMin($x_grid);
        }
    
        $this->x_grid = $x_grid;
    }
    
    /**
     * Returns y_grid.
     *
     * @return int
     */
    public function getYGrid(): int
    {
        return $this->y_grid;
    }
    
    /**
     * Sets y_grid.
     *
     * @param int $y_grid
     */
    public function setYGrid(int $y_grid): void
    {
        if ($y_grid > Property::Y_GRID_MAX) {
            throw ConfigException::yGridOverMax($y_grid);
        }
    
        if ($y_grid < Property::Y_GRID_MIN) {
            throw ConfigException::yGridUnderMin($y_grid);
        }
        
        $this->y_grid = $y_grid;
    }
    
    /**
     * Returns coordinates_format.
     *
     * @return string
     */
    public function getCoordinatesFormat(): string
    {
        return $this->coordinates_format;
    }
    
    /**
     * Sets coordinates_format.
     *
     * @param string $coordinates_format
     */
    public function setCoordinatesFormat(string $coordinates_format): void
    {
        $this->coordinates_format = $coordinates_format;
    }
    
    /**
     * Returns display_coordinates.
     *
     * @return bool
     */
    public function isCoordinatesGuidevisible(): bool
    {
        return $this->coordinates_guide_visible;
    }
    
    /**
     * Sets display_coordinates.
     *
     * @param bool $coordinates_guide_visible
     */
    public function setCoordinatesGuidevisible(bool $coordinates_guide_visible): void
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
