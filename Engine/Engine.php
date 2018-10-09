<?php
declare(strict_types=1);

namespace Havoc\Engine\Engine;

use Havoc\Engine\Config\ConfigController;
use Havoc\Engine\ControllerFactory\ControllerFactory;
use Havoc\Engine\Tick\TickController;
use Havoc\Engine\Tick\TickControllerInterface;
use Havoc\Engine\World\WorldController;

/**
 * Havoc Engine API class.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class Engine
{
    /**
     * Configuration controller.
     *
     * @var ConfigController
     */
    private $config_controller;
    
    /**
     * World controller.
     *
     * @var WorldController
     */
    private $world_controller;
    
    /**
     * Tick controller.
     *
     * @var TickControllerInterface
     */
    private $tick_controller;
    
    /**
     * Engine constructor method.
     *
     * @param string $config_controller
     * @param string $world_controller
     * @param string $tick_controller
     * @throws \ReflectionException
     */
    public function __construct(string $config_controller = ConfigController::class, string $world_controller = WorldController::class, string $tick_controller = TickController::class)
    {
        $this->setConfigController(
            ControllerFactory::newConfigController($config_controller)
        );
        
        $this->setWorldController(
            ControllerFactory::newWorldController($this->getConfigController(), $world_controller)
        );
        
        $this->setTickController(
            ControllerFactory::newTickController($tick_controller)
        );
    }
    
    /**
     * Render and return the world grid.
     *
     * Optionally increment the world tick.
     *
     * @param bool $increment_tick
     * @return string
     */
    public function renderWorld(bool $increment_tick = true): string
    {
        $world = $this->getWorldController();
        
        $world->composeRender();

        if (true === $increment_tick) {
            $this->getTickController()->incrementTick();
        }
        
        return $world->getRender()->__toString();
    }
    
    /**
     * Returns config_controller.
     *
     * @return ConfigController
     */
    public function getConfigController(): ConfigController
    {
        return $this->config_controller;
    }
    
    /**
     * Sets config_controller.
     *
     * @param ConfigController $config_controller
     */
    public function setConfigController(ConfigController $config_controller): void
    {
        $this->config_controller = $config_controller;
    }
    
    /**
     * Returns world.
     *
     * @return WorldController
     */
    public function getWorldController(): WorldController
    {
        return $this->world_controller;
    }
    
    /**
     * Sets world.
     *
     * @param WorldController $world_controller
     */
    public function setWorldController(WorldController $world_controller): void
    {
        $this->world_controller = $world_controller;
    }
    
    /**
     * Returns tick_controller.
     *
     * @return TickControllerInterface
     */
    public function getTickController(): TickControllerInterface
    {
        return $this->tick_controller;
    }
    
    /**
     * Sets tick_controller.
     *
     * @param TickControllerInterface $tick_controller
     */
    public function setTickController(TickControllerInterface $tick_controller): void
    {
        $this->tick_controller = $tick_controller;
    }
}
