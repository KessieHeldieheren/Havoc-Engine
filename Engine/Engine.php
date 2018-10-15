<?php
declare(strict_types=1);

namespace Havoc\Engine\Engine;

use Havoc\Engine\Config\ConfigController;
use Havoc\Engine\Config\ConfigControllerFactory;
use Havoc\Engine\ControllerFactory\ControllerFactory;
use Havoc\Engine\Entity\EntityController;
use Havoc\Engine\Entity\EntityControllerFactory;
use Havoc\Engine\Entity\EntityControllerInterface;
use Havoc\Engine\Logger\LogController;
use Havoc\Engine\Logger\LogControllerFactory;
use Havoc\Engine\Logger\LogControllerInterface;
use Havoc\Engine\Render\RenderInterface;
use Havoc\Engine\Tick\TickController;
use Havoc\Engine\Tick\TickControllerFactory;
use Havoc\Engine\Tick\TickControllerInterface;
use Havoc\Engine\World\WorldController;
use Havoc\Engine\World\WorldControllerFactory;

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
     * Entity controller.
     *
     * @var EntityControllerInterface
     */
    private $entity_controller;
    
    /**
     * Log controller.
     *
     * @var LogControllerInterface
     */
    private $log_controller;
    
    /**
     * Engine constructor method.
     */
    public function __construct()
    {
        $this->bootstrapEngine();
    }
    
    /**
     * Bootstrap the game engine's controllers.
     *
     * @throws \ReflectionException
     */
    public function bootstrapEngine(): void
    {
        $this->setConfigController(
            ConfigControllerFactory::newConfigController(ConfigController::class)
        );
        
        $this->setLogController(
            LogControllerFactory::newLogController(LogController::class)
        );
        
        $this->setWorldController(
            WorldControllerFactory::newWorldController(
                $this->getConfigController(),
                WorldController::class
            )
        );
        
        $this->setTickController(
            TickControllerFactory::newTickController(TickController::class)
        );
        
        $this->setEntityController(
            EntityControllerFactory::newEntityController(
                $this->getConfigController(),
                $this->getWorldController()->getGrid(),
                $this->getLogController(),
                EntityController::class
            )
        );
    }
    
    /**
     * Render world and return result.
     *
     * @param bool $increment_tick
     * @return RenderInterface
     */
    public function render(bool $increment_tick = true): RenderInterface
    {
        $world_controller = $this->getWorldController();
        $entity_controller = $this->getEntityController();
        
        if (true === $increment_tick) {
            $this->getTickController()->incrementTick();
        }
        
        $world_controller->getGrid()->insertEmptyPoints();
        $entity_controller->mapEntitiesToGrid();
        $world_controller->getRenderer()->render();
        
        return $world_controller->getRender();
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
    
    /**
     * Returns entity_controller.
     *
     * @return EntityControllerInterface
     */
    public function getEntityController(): EntityControllerInterface
    {
        return $this->entity_controller;
    }
    
    /**
     * Sets entity_controller.
     *
     * @param EntityControllerInterface $entity_controller
     */
    public function setEntityController(EntityControllerInterface $entity_controller): void
    {
        $this->entity_controller = $entity_controller;
    }
    
    /**
     * Returns log_controller.
     *
     * @return LogControllerInterface
     */
    public function getLogController(): LogControllerInterface
    {
        return $this->log_controller;
    }
    
    /**
     * Sets log_controller.
     *
     * @param LogControllerInterface $log_controller
     */
    public function setLogController(LogControllerInterface $log_controller): void
    {
        $this->log_controller = $log_controller;
    }
}
