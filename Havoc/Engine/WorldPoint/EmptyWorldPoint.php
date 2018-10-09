<?php
declare(strict_types=1);

namespace Havoc\Engine\WorldPoint;

use Havoc\Engine\Config\DefaultConfig;
use Havoc\Engine\World\WorldPointInterface;

/**
 * Havoc Engine empty world point.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class EmptyWorldPoint implements WorldPointInterface
{
    /**
     * World point display icon.
     *
     * @var string
     */
    private $icon = DefaultConfig::WORLD_POINT_NORMAL_ICON;
    
    /**
     * Returns display icon.
     *
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }
    
    /**
     * Sets display icon.
     *
     * @param string $icon
     */
    public function setIcon(string $icon): void
    {
        $this->icon = $icon;
    }
}
