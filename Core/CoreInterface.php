<?php
declare(strict_types=1);

namespace Havoc\Engine\Core;

use Havoc\Engine\Config\ConfigController;
use Havoc\Engine\Core\Controllers\Controllers;
use Havoc\Engine\Entity\EntityController\EntityControllerInterface;
use Havoc\Engine\Logger\LogController\LogControllerInterface;
use Havoc\Engine\Save\SaveController\SaveControllerInterface;
use Havoc\Engine\Tick\TickController\TickControllerInterface;
use Havoc\Engine\World\WorldController;

interface CoreInterface
{
    /**
     * Returns config_controller.
     *
     * @return ConfigController
     */
    public function getConfigController(): ConfigController;
    
    /**
     * Sets config_controller.
     *
     * @param ConfigController $config_controller
     */
    public function setConfigController(ConfigController $config_controller): void;
    
    /**
     * Returns world.
     *
     * @return WorldController
     */
    public function getWorldController(): WorldController;
    
    /**
     * Sets world.
     *
     * @param WorldController $world_controller
     */
    public function setWorldController(WorldController $world_controller): void;
    
    /**
     * Returns tick_controller.
     *
     * @return TickControllerInterface
     */
    public function getTickController(): TickControllerInterface;
    
    /**
     * Sets tick_controller.
     *
     * @param TickControllerInterface $tick_controller
     */
    public function setTickController(TickControllerInterface $tick_controller): void;
    
    /**
     * Returns entity_controller.
     *
     * @return EntityControllerInterface
     */
    public function getEntityController(): EntityControllerInterface;
    
    /**
     * Sets entity_controller.
     *
     * @param EntityControllerInterface $entity_controller
     */
    public function setEntityController(EntityControllerInterface $entity_controller): void;
    
    /**
     * Returns log_controller.
     *
     * @return LogControllerInterface
     */
    public function getLogController(): LogControllerInterface;
    
    /**
     * Sets log_controller.
     *
     * @param LogControllerInterface $log_controller
     */
    public function setLogController(LogControllerInterface $log_controller): void;
    
    /**
     * Returns controllers.
     *
     * @return Controllers
     */
    public function getControllers(): Controllers;
    
    /**
     * Bootstrap the game engine's controllers.
     *
     * @throws \ReflectionException
     */
    public function bootstrap(): void;
    
    /**
     * Returns save_controller.
     *
     * @return SaveControllerInterface
     */
    public function getSaveController(): SaveControllerInterface;
    
    /**
     * Sets save_controller.
     *
     * @param SaveControllerInterface $save_controller
     */
    public function setSaveController(SaveControllerInterface $save_controller): void;
}
