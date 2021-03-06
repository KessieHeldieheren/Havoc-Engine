<?php
declare(strict_types=1);

namespace Havoc\Engine\Render;

use Havoc\Engine\Config\ConfigControllerInterface;

/**
 * Havoc Engine world render interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface RenderInterface
{
    /**
     * Render constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     */
    public function __construct(ConfigControllerInterface $config_controller);
    
    /**
     * Clear the render.
     */
    public function clear(): void;
    
    /**
     * Returns render.
     *
     * @return string
     */
    public function string(): string;
    
    /**
     * Append string to render.
     *
     * @param string $append
     * @param bool $newline
     */
    public function append(string $append = "", bool $newline = true): void;
    
    /**
     * Sets render.
     *
     * @param string $render
     */
    public function set(string $render): void;
}
