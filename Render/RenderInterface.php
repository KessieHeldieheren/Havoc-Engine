<?php
declare(strict_types=1);

namespace Havoc\Engine\Render;

use Havoc\Engine\Config\ConfigControllerInterface;

/**
 * Havoc Engine world render interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
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
    public function clearRender(): void;
    
    /**
     * Returns render.
     *
     * @return string
     */
    public function getRender(): string;
    
    /**
     * Append string to render.
     *
     * @param string $append
     * @param bool $newline
     */
    public function appendRender(string $append, bool $newline = true): void;
    
    /**
     * Sets render.
     *
     * @param string $render
     */
    public function setRender(string $render): void;
    
    /**
     * @return string
     */
    public function __toString();
}
