<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Core\Systems\SupervisorsInterface;
use Havoc\Engine\Entity\Translation\TranslationSupervisorInterface;
use Havoc\Engine\Entity\Type\TypeSupervisorInterface;
use Havoc\Engine\Grid\Standard\GridSupervisorInterface;
use Havoc\Engine\Logger\LogControllerInterface;

/**
 * Havoc Core entity controller interface.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
interface EntityControllerInterface
{
    /**
     * EntityController constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     * @param GridSupervisorInterface $grid
     * @param LogControllerInterface $logger
     */
    public function __construct(ConfigControllerInterface $config_controller, GridSupervisorInterface $grid, LogControllerInterface $logger);
    
    /**
     * Maps all entities onto the grid.
     */
    public function mapEntitiesToGrid(): void;
    
    /**
     * Returns entity_collection.
     *
     * @return EntitySupervisorInterface
     */
    public function getEntitySupervisor(): EntitySupervisorInterface;
    
    /**
     * Returns type_controller.
     *
     * @return TypeSupervisorInterface
     */
    public function getTypeSupervisor(): TypeSupervisorInterface;
    
    /**
     * Returns translation_controller.
     *
     * @return TranslationSupervisorInterface
     */
    public function getTranslationSupervisor(): TranslationSupervisorInterface;
}
