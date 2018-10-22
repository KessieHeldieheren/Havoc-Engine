<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\EntityController;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Entity\Boundary\BoundarySupervisor\BoundarySupervisorInterface;
use Havoc\Engine\Entity\EntitySupervisor\EntitySupervisorInterface;
use Havoc\Engine\Entity\Translation\TranslationSupervisor\TranslationSupervisorInterface;
use Havoc\Engine\Entity\Type\TypeSupervisor\TypeSupervisorInterface;
use Havoc\Engine\Grid\Standard\GridSupervisorInterface;
use Havoc\Engine\Logger\LogController\LogControllerInterface;

/**
 * Havoc Engine entity controller interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface EntityControllerInterface
{
    /**
     * EntityController constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     * @param GridSupervisorInterface $grid
     * @param \Havoc\Engine\Logger\LogController\LogControllerInterface $logger
     * @throws \ReflectionException
     */
    public function __construct(ConfigControllerInterface $config_controller, GridSupervisorInterface $grid, LogControllerInterface $logger);
    
    /**
     * Returns grid.
     *
     * @return GridSupervisorInterface
     */
    public function getGrid(): GridSupervisorInterface;
    
    /**
     * Sets grid.
     *
     * @param GridSupervisorInterface $grid
     */
    public function setGrid(GridSupervisorInterface $grid): void;
    
    /**
     * Returns config.
     *
     * @return ConfigControllerInterface
     */
    public function getConfigController(): ConfigControllerInterface;
    
    /**
     * Sets config.
     *
     * @param ConfigControllerInterface $config_controller
     */
    public function setConfigController(ConfigControllerInterface $config_controller): void;
    
    /**
     * Maps all entities onto the grid.
     */
    public function mapEntitiesToGrid(): void;
    
    /**
     * Returns entity_collection.
     *
     * @return \Havoc\Engine\Entity\EntitySupervisor\EntitySupervisorInterface
     */
    public function getEntitySupervisor(): EntitySupervisorInterface;
    
    /**
     * Sets entity_collection.
     *
     * @param EntitySupervisorInterface $entity_supervisor
     */
    public function setEntitySupervisor(EntitySupervisorInterface $entity_supervisor): void;
    
    /**
     * Returns logger.
     *
     * @return \Havoc\Engine\Logger\LogController\LogControllerInterface
     */
    public function getLogcontroller(): LogControllerInterface;
    
    /**
     * Sets logger.
     *
     * @param LogControllerInterface $log_controller
     */
    public function setLogcontroller(LogControllerInterface $log_controller): void;
    
    /**
     * Returns type_controller.
     *
     * @return TypeSupervisorInterface
     */
    public function getTypeSupervisor(): TypeSupervisorInterface;
    
    /**
     * Sets type_controller.
     *
     * @param TypeSupervisorInterface $type_supervisor
     */
    public function setTypeSupervisor(TypeSupervisorInterface $type_supervisor): void;
    
    /**
     * Returns translation_controller.
     *
     * @return \Havoc\Engine\Entity\Translation\TranslationSupervisor\TranslationSupervisorInterface
     */
    public function getTranslationSupervisor(): TranslationSupervisorInterface;
    
    /**
     * Sets translation_controller.
     *
     * @param TranslationSupervisorInterface $translation_supervisor
     */
    public function setTranslationSupervisor(TranslationSupervisorInterface $translation_supervisor): void;
    
    /**
     * Returns boundary_supervisor.
     *
     * @return \Havoc\Engine\Entity\Boundary\BoundarySupervisor\BoundarySupervisorInterface
     */
    public function getBoundarySupervisor(): BoundarySupervisorInterface;
    
    /**
     * Sets boundary_supervisor.
     *
     * @param \Havoc\Engine\Entity\Boundary\BoundarySupervisor\BoundarySupervisorInterface $boundary_supervisor
     */
    public function setBoundarySupervisor(BoundarySupervisorInterface $boundary_supervisor): void;
}
