<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Entity\Boundary\BoundarySupervisorFactory;
use Havoc\Engine\Entity\Boundary\BoundarySupervisorInterface;
use Havoc\Engine\Entity\Translation\TranslationSupervisorFactory;
use Havoc\Engine\Entity\Translation\TranslationSupervisorInterface;
use Havoc\Engine\Entity\Type\TypeSupervisorFactory;
use Havoc\Engine\Entity\Type\TypeSupervisorInterface;
use Havoc\Engine\Grid\Standard\GridSupervisorInterface;
use Havoc\Engine\Logger\LogControllerInterface;

/**
 * Havoc Core entity controller.
 *
 * @package Havoc-Core
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
    private $grid;
    
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
        $this->setGrid($grid);
        $this->setLogcontroller($logger);
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
            EntityFactory::newEntitySupervisor(
                $this->getLogcontroller()
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
                $this->getLogcontroller(),
                $this->getGrid()
            )
        );
        
        $this->setBoundarySupervisor(
            BoundarySupervisorFactory::new(
                $this->getEntitySupervisor(),
                $this->getLogcontroller(),
                $this->getGrid()->getBoundary()
            )
        );
    }
    
    /**
     * Returns grid.
     *
     * @return GridSupervisorInterface
     */
    public function getGrid(): GridSupervisorInterface
    {
        return $this->grid;
    }
    
    /**
     * Sets grid.
     *
     * @param GridSupervisorInterface $grid
     */
    public function setGrid(GridSupervisorInterface $grid): void
    {
        $this->grid = $grid;
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
     * Maps all entities onto the grid.
     */
    public function mapEntitiesToGrid(): void
    {
        $grid = $this->getGrid();
        
        foreach ($this->getEntitySupervisor()->getEntities() as $entity) {
            $grid->insertWithCoordinates($entity, $entity->getCoordinates());
        }
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
    public function getLogcontroller(): LogControllerInterface
    {
        return $this->log_controller;
    }
    
    /**
     * Sets logger.
     *
     * @param LogControllerInterface $log_controller
     */
    public function setLogcontroller(LogControllerInterface $log_controller): void
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
