<?php
declare(strict_types=1);

namespace Havoc\Engine\Render;

use Havoc\Engine\Config\ConfigControllerInterface;

/**
 * Havoc Engine world render.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class Render implements RenderInterface
{
    /**
     * Configuration controller.
     *
     * @var ConfigControllerInterface
     */
    private $config_controller;
    
    /**
     * World render.
     *
     * @var string
     */
    private $render = "";
    
    /**
     * Render constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     */
    public function __construct(ConfigControllerInterface $config_controller)
    {
        $this->setConfigController($config_controller);
    }
    
    /**
     * Clear the render.
     */
    public function clear(): void
    {
        $this->render = "";
    }
    
    /**
     * Returns render.
     *
     * @return string
     */
    public function string(): string
    {
        return $this->render;
    }
    
    /**
     * Append string to render.
     *
     * @param string $append
     * @param bool $newline
     */
    public function append(string $append = "", bool $newline = true): void
    {
        $this->render .= $append;
        
        if (true === $newline) {
            $this->render .= PHP_EOL;
        }
    }
    
    /**
     * Sets render.
     *
     * @param string $render
     */
    public function set(string $render): void
    {
        $this->render = $render;
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
}
