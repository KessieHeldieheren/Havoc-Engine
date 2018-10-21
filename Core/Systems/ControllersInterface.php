<?php
declare(strict_types=1);

namespace Havoc\Engine\Core\Systems;

/**
 * Havoc Engine controllers interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface ControllersInterface
{
    /**
     * Returns config_controller.
     *
     * @return string
     */
    public function getConfigController(): string;
    
    /**
     * Sets config_controller.
     *
     * @param string $config_controller
     */
    public function setConfigController(string $config_controller): void;
    
    /**
     * Returns world_controller.
     *
     * @return string
     */
    public function getWorldController(): string;
    
    /**
     * Sets world_controller.
     *
     * @param string $world_controller
     */
    public function setWorldController(string $world_controller): void;
    
    /**
     * Returns tick_controller.
     *
     * @return string
     */
    public function getTickController(): string;
    
    /**
     * Sets tick_controller.
     *
     * @param string $tick_controller
     */
    public function setTickController(string $tick_controller): void;
    
    /**
     * Returns entity_controller.
     *
     * @return string
     */
    public function getEntityController(): string;
    
    /**
     * Sets entity_controller.
     *
     * @param string $entity_controller
     */
    public function setEntityController(string $entity_controller): void;
    
    /**
     * Returns log_controller.
     *
     * @return string
     */
    public function getLogController(): string;
    
    /**
     * Sets log_controller.
     *
     * @param string $log_controller
     */
    public function setLogController(string $log_controller): void;
}