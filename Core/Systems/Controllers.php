<?php
declare(strict_types=1);

namespace Havoc\Engine\Core\Systems;

use Havoc\Engine\Config\ConfigController;
use Havoc\Engine\Entity\EntityController;
use Havoc\Engine\Logger\LogController;
use Havoc\Engine\Tick\TickController;
use Havoc\Engine\World\WorldController;

/**
 * Havoc Engine controllers.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class Controllers implements ControllersInterface
{
    /**
     * Configuration controller class name.
     *
     * @var string
     */
    private $config_controller = ConfigController::class;
    
    /**
     * World controller.
     *
     * @var string
     */
    private $world_controller = WorldController::class;
    
    /**
     * Tick controller.
     *
     * @var string
     */
    private $tick_controller = TickController::class;
    
    /**
     * Entity controller.
     *
     * @var string
     */
    private $entity_controller = EntityController::class;
    
    /**
     * Log controller.
     *
     * @var string
     */
    private $log_controller = LogController::class;
    
    /**
     * Returns config_controller.
     *
     * @return string
     */
    public function getConfigController(): string
    {
        return $this->config_controller;
    }
    
    /**
     * Sets config_controller.
     *
     * @param string $config_controller
     */
    public function setConfigController(string $config_controller): void
    {
        $this->config_controller = $config_controller;
    }
    
    /**
     * Returns world_controller.
     *
     * @return string
     */
    public function getWorldController(): string
    {
        return $this->world_controller;
    }
    
    /**
     * Sets world_controller.
     *
     * @param string $world_controller
     */
    public function setWorldController(string $world_controller): void
    {
        $this->world_controller = $world_controller;
    }
    
    /**
     * Returns tick_controller.
     *
     * @return string
     */
    public function getTickController(): string
    {
        return $this->tick_controller;
    }
    
    /**
     * Sets tick_controller.
     *
     * @param string $tick_controller
     */
    public function setTickController(string $tick_controller): void
    {
        $this->tick_controller = $tick_controller;
    }
    
    /**
     * Returns entity_controller.
     *
     * @return string
     */
    public function getEntityController(): string
    {
        return $this->entity_controller;
    }
    
    /**
     * Sets entity_controller.
     *
     * @param string $entity_controller
     */
    public function setEntityController(string $entity_controller): void
    {
        $this->entity_controller = $entity_controller;
    }
    
    /**
     * Returns log_controller.
     *
     * @return string
     */
    public function getLogController(): string
    {
        return $this->log_controller;
    }
    
    /**
     * Sets log_controller.
     *
     * @param string $log_controller
     */
    public function setLogController(string $log_controller): void
    {
        $this->log_controller = $log_controller;
    }
}
