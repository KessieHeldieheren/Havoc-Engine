<?php
declare(strict_types=1);

namespace Havoc\Engine\Api;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Core\Core;
use Havoc\Engine\Core\CoreInterface;
use Havoc\Engine\Core\Controllers\ControllersInterface;
use Havoc\Engine\Entity\Boundary\BoundaryViolation\BoundaryViolationCollection\BoundaryViolationCollectionInterface;
use Havoc\Engine\Entity\EntitySupervisor\EntitySupervisorInterface;
use Havoc\Engine\Entity\Translation\TranslationSupervisor\TranslationSupervisorInterface;
use Havoc\Engine\Entity\Type\TypeSupervisor\TypeSupervisorInterface;
use Havoc\Engine\Grid\GridView\GridViewInterface;
use Havoc\Engine\Logger\LogController\LogControllerInterface;
use Havoc\Engine\Render\RenderInterface;
use Havoc\Engine\Tick\TickController\TickControllerInterface;
use Havoc\Engine\World\WorldControllerInterface;

/**
 * Havoc Engine API class.
 *
 * This class is intended to ease the use of accessing and finding different engine components.
 *
 * It contains all classes that are necessary to making a game. More advanced functionality can be acquired by
 * accessing engine modules directly.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class Api implements ApiInterface
{
    /**
     * Havoc game engine.
     *
     * @var CoreInterface
     */
    private $core;
    
    /**
     * Api constructor method.
     */
    public function __construct()
    {
        $this->setCore(new Core());
    }
    
    /**
     * Render world and return result.
     *
     * @return RenderInterface
     */
    public function render(): RenderInterface
    {
        $world_controller = $this->getCore()->getWorldController();
        $entity_controller = $this->getCore()->getEntityController();
    
        $this->getCore()->getTickController()->incrementCurrentTick();
        $world_controller->getGridSupervisor()->getGridView()->updateViewAxes();
        $world_controller->getGridSupervisor()->insertEmptyPoints();
        $entity_controller->getBoundarySupervisor()->rectifyBoundaryViolations();
        # Add detect collisions here.
        $entity_controller->mapEntitiesToGrid();
        $world_controller->getRenderer()->render();
        
        return $world_controller->getRender();
    }
    
    /**
     * Bootstraps the engine core.
     *
     * @throws \ReflectionException
     */
    public function bootstrap(): void
    {
        $this->getCore()->bootstrap();
    }
    
    /**
     * Returns the system controllers collection.
     *
     * @return ControllersInterface
     */
    public function controllers(): ControllersInterface
    {
        return $this->getCore()->getControllers();
    }
    
    /**
     * Returns the configuration controller.
     *
     * @return ConfigControllerInterface
     */
    public function config(): ConfigControllerInterface
    {
        return $this->getCore()->getConfigController();
    }
    
    /**
     * Returns the world controller.
     *
     * @return WorldControllerInterface
     */
    public function world(): WorldControllerInterface
    {
        return $this->getCore()->getWorldController();
    }
    
    /**
     * Returns the tick controller.
     *
     * @return TickControllerInterface
     */
    public function tick(): TickControllerInterface
    {
        return $this->getCore()->getTickController();
    }
    
    /**
     * Returns the entity controller.
     *
     * @return EntitySupervisorInterface
     */
    public function entities(): EntitySupervisorInterface
    {
        return $this->getCore()->getEntityController()->getEntitySupervisor();
    }
    
    /**
     * Returns the log controller.
     *
     * @return LogControllerInterface
     */
    public function logger(): LogControllerInterface
    {
        return $this->getCore()->getLogController();
    }
    
    /**
     * Returns the entity type controller.
     *
     * @return TypeSupervisorInterface
     */
    public function types(): TypeSupervisorInterface
    {
        return $this->getCore()->getEntityController()->getTypeSupervisor();
    }
    
    /**
     * Returns the entity translation controller.
     *
     * @return TranslationSupervisorInterface
     */
    public function translation(): TranslationSupervisorInterface
    {
        return $this->getCore()->getEntityController()->getTranslationSupervisor();
    }
    
    /**
     * Returns all entities that are out of bounds in the current tick.
     *
     * @return BoundaryViolationCollectionInterface
     */
    public function boundaryViolations(): BoundaryViolationCollectionInterface
    {
        return $this->getCore()->getEntityController()->getBoundarySupervisor()->getBoundaryViolations();
    }
    
    /**
     * Returns the grid view, which allows camera view manipulation.
     *
     * @return GridViewInterface
     */
    public function view(): GridViewInterface
    {
        return $this->getCore()->getWorldController()->getGridSupervisor()->getGridView();
    }
    
    /**
     * Returns engine.
     *
     * @return CoreInterface
     */
    public function getCore(): CoreInterface
    {
        return $this->core;
    }
    
    /**
     * Sets engine.
     *
     * @param CoreInterface $core
     */
    protected function setCore(CoreInterface $core): void
    {
        $this->core = $core;
    }
}
