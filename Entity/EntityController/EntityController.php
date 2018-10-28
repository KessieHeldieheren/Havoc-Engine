<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\EntityController;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Entity\Boundary\BoundarySupervisor\BoundarySupervisorFactory;
use Havoc\Engine\Entity\Boundary\BoundarySupervisor\BoundarySupervisorInterface;
use Havoc\Engine\Entity\EntitySupervisor\EntitySupervisorFactory;
use Havoc\Engine\Entity\EntitySupervisor\EntitySupervisorInterface;
use Havoc\Engine\Entity\Translation\TranslationSupervisor\TranslationSupervisorFactory;
use Havoc\Engine\Entity\Translation\TranslationSupervisor\TranslationSupervisorInterface;
use Havoc\Engine\Entity\Type\TypeSupervisor\TypeSupervisorFactory;
use Havoc\Engine\Entity\Type\TypeSupervisor\TypeSupervisorInterface;
use Havoc\Engine\Grid\GridSupervisor\GridSupervisorInterface;
use Havoc\Engine\Logger\LogController\LogControllerInterface;

/**
 * Havoc Engine entity controller.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class EntityController implements EntityControllerInterface
{
    /**
     * Grid.
     *
     * @var GridSupervisorInterface
     */
    private $grid_supervisor;
    
    /**
     * Configuration controller.
     *
     * @var ConfigControllerInterface
     */
    private $config_controller;
    
    /**
     * Entity supervisor.
     *
     * @var EntitySupervisorInterface
     */
    private $entity_supervisor;
    
    /**
     * Log controller.
     *
     * @var LogControllerInterface
     */
    private $log_controller;
    
    /**
     * Entity type supervisor.
     *
     * @var TypeSupervisorInterface
     */
    private $type_supervisor;
    
    /**
     * Translation supervisor.
     *
     * @var TranslationSupervisorInterface
     */
    private $translation_supervisor;
    
    /**
     * Boundary supervisor.
     *
     * @var BoundarySupervisorInterface
     */
    private $boundary_supervisor;
    
    /**
     * EntityController constructor method.
     *
     * @param ConfigControllerInterface $config_controller
     * @param GridSupervisorInterface $grid
     * @param LogControllerInterface $logger
     * @throws \ReflectionException
     */
    public function __construct(ConfigControllerInterface $config_controller, GridSupervisorInterface $grid, LogControllerInterface $logger)
    {
        $this->setConfigController($config_controller);
        $this->setGridSupervisor($grid);
        $this->setLogController($logger);
        $this->bootstrap();
    }
    
    /**
     * Bootstrap default dependencies.
     *
     * @throws \ReflectionException
     */
    protected function bootstrap(): void
    {
        $this->setEntitySupervisor(
            EntitySupervisorFactory::new(
                $this->getLogController()
            )
        );
    
        $this->setTypeSupervisor(
            TypeSupervisorFactory::new(
                $this->getEntitySupervisor()
            )
        );
        
        $this->setTranslationSupervisor(
            TranslationSupervisorFactory::new(
                $this->getEntitySupervisor(),
                $this->getLogController(),
                $this->getGridSupervisor()
            )
        );
        
        $this->setBoundarySupervisor(
            BoundarySupervisorFactory::new(
                $this->getEntitySupervisor(),
                $this->getLogController(),
                $this->getGridSupervisor()->getGridBoundary(),
                $this->getConfigController()
            )
        );
    }
    
    /**
     * Maps all entities onto the grid.
     */
    public function mapEntitiesToGrid(): void
    {
        $grid = $this->getGridSupervisor();
        
        foreach ($this->getEntitySupervisor()->getEntityCollection()->getEntities() as $entity) {
            if ($entity->isVisible() === false) {
                continue;
            }
            
            $grid->insertWithCoordinates($entity, $entity->getCoordinates());
        }
    }
    
    /**
     * Returns grid.
     *
     * @return GridSupervisorInterface
     */
    public function getGridSupervisor(): GridSupervisorInterface
    {
        return $this->grid_supervisor;
    }
    
    /**
     * Sets grid.
     *
     * @param GridSupervisorInterface $grid_supervisor
     */
    public function setGridSupervisor(GridSupervisorInterface $grid_supervisor): void
    {
        $this->grid_supervisor = $grid_supervisor;
    }
    
    /**
     * Returns config.
     *
     * @return ConfigControllerInterface
     */
    public function getConfigController(): ConfigControllerInterface
    {
        return $this->config_controller;
    }
    
    /**
     * Sets config.
     *
     * @param ConfigControllerInterface $config_controller
     */
    public function setConfigController(ConfigControllerInterface $config_controller): void
    {
        $this->config_controller = $config_controller;
    }
    
    /**
     * Returns entity_collection.
     *
     * @return EntitySupervisorInterface
     */
    public function getEntitySupervisor(): EntitySupervisorInterface
    {
        return $this->entity_supervisor;
    }
    
    /**
     * Sets entity_collection.
     *
     * @param EntitySupervisorInterface $entity_supervisor
     */
    public function setEntitySupervisor(EntitySupervisorInterface $entity_supervisor): void
    {
        $this->entity_supervisor = $entity_supervisor;
    }
    
    /**
     * Returns logger.
     *
     * @return LogControllerInterface
     */
    public function getLogController(): LogControllerInterface
    {
        return $this->log_controller;
    }
    
    /**
     * Sets logger.
     *
     * @param LogControllerInterface $log_controller
     */
    public function setLogController(LogControllerInterface $log_controller): void
    {
        $this->log_controller = $log_controller;
    }
    
    /**
     * Returns type_controller.
     *
     * @return TypeSupervisorInterface
     */
    public function getTypeSupervisor(): TypeSupervisorInterface
    {
        return $this->type_supervisor;
    }
    
    /**
     * Sets type_controller.
     *
     * @param TypeSupervisorInterface $type_supervisor
     */
    public function setTypeSupervisor(TypeSupervisorInterface $type_supervisor): void
    {
        $this->type_supervisor = $type_supervisor;
    }
    
    /**
     * Returns translation_controller.
     *
     * @return TranslationSupervisorInterface
     */
    public function getTranslationSupervisor(): TranslationSupervisorInterface
    {
        return $this->translation_supervisor;
    }
    
    /**
     * Sets translation_controller.
     *
     * @param TranslationSupervisorInterface $translation_supervisor
     */
    public function setTranslationSupervisor(TranslationSupervisorInterface $translation_supervisor): void
    {
        $this->translation_supervisor = $translation_supervisor;
    }
    
    /**
     * Returns boundary_supervisor.
     *
     * @return BoundarySupervisorInterface
     */
    public function getBoundarySupervisor(): BoundarySupervisorInterface
    {
        return $this->boundary_supervisor;
    }
    
    /**
     * Sets boundary_supervisor.
     *
     * @param BoundarySupervisorInterface $boundary_supervisor
     */
    public function setBoundarySupervisor(BoundarySupervisorInterface $boundary_supervisor): void
    {
        $this->boundary_supervisor = $boundary_supervisor;
    }
}
