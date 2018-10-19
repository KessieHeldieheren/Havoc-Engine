<?php
declare(strict_types=1);

namespace Havoc\Engine\Core;

use Havoc\Engine\Config\ConfigController;
use Havoc\Engine\Config\ConfigControllerFactory;
use Havoc\Engine\Core\Systems\Controllers;
use Havoc\Engine\Entity\EntityControllerFactory;
use Havoc\Engine\Entity\EntityControllerInterface;
use Havoc\Engine\Logger\LogControllerFactory;
use Havoc\Engine\Logger\LogControllerInterface;
use Havoc\Engine\Tick\TickControllerFactory;
use Havoc\Engine\Tick\TickControllerInterface;
use Havoc\Engine\World\WorldController;
use Havoc\Engine\World\WorldControllerFactory;

/**
 * Havoc Core class.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class Core implements CoreInterface
{
    /**
     * Core controllers.
     *
     * @var Controllers
     */
    private $controllers;
    
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
     * Core constructor method.
     */
    public function __construct()
    {
        $this->setControllers(new Controllers());
    }
    
    /**
     * Bootstrap the game engine's controllers.
     *
     * @throws \ReflectionException
     */
    public function bootstrap(): void
    {
        $controllers = $this->getControllers();
        
        $this->setTickController(
            TickControllerFactory::newTickController($controllers->getTickController())
        );
        
        $this->setConfigController(
            ConfigControllerFactory::newConfigController($controllers->getConfigController())
        );
    
        $this->setLogController(
            LogControllerFactory::newLogController(
                $this->getTickController(),
                $controllers->getLogController()
            )
        );
    
        $this->setWorldController(
            WorldControllerFactory::newWorldController(
                $this->getConfigController(),
                $controllers->getWorldController()
            )
        );
        
        $this->setEntityController(
            EntityControllerFactory::newEntityController(
                $this->getConfigController(),
                $this->getWorldController()->getGridSupervisor(),
                $this->getLogController(),
                $controllers->getEntityController()
            )
        );
        
        $this->getTickController()->incrementTick();
    }
    
    /**
     * Returns controllers.
     *
     * @return Controllers
     */
    public function getControllers(): Controllers
    {
        return $this->controllers;
    }
    
    /**
     * Sets controllers.
     *
     * @param Controllers $controllers
     */
    protected function setControllers(Controllers $controllers): void
    {
        $this->controllers = $controllers;
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
