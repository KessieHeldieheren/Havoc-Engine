<?php
declare(strict_types=1);

namespace Havoc\Engine;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Core\Core;
use Havoc\Engine\Core\CoreInterface;
use Havoc\Engine\Core\Systems\ControllersInterface;
use Havoc\Engine\Core\Systems\SupervisorsInterface;
use Havoc\Engine\Entity\EntitySupervisorInterface;
use Havoc\Engine\Entity\Translation\TranslationSupervisorInterface;
use Havoc\Engine\Entity\Type\TypeSupervisorInterface;
use Havoc\Engine\Logger\LogControllerInterface;
use Havoc\Engine\Render\RenderInterface;
use Havoc\Engine\Tick\TickControllerInterface;
use Havoc\Engine\World\WorldControllerInterface;

/**
 * Havoc Core API class.
 *
 * This class is intended to ease the use of accessing and finding different engine components.
 *
 * It contains all classes that are necessary to making a game. More advanced functionality can be acquired by
 * accessing engine modules directly.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class Api
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
        $this->getCore()->getTickController()->incrementTick();
        
        $world_controller = $this->getCore()->getWorldController();
        $entity_controller = $this->getCore()->getEntityController();
        
        $world_controller->getGridSupervisor()->insertEmptyPoints();
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
     * Returns the system supervisors collection.
     *
     * @return SupervisorsInterface
     */
    public function supervisors(): SupervisorsInterface
    {
        return $this->getCore()->getSupervisors();
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
    public function translator(): TranslationSupervisorInterface
    {
        return $this->getCore()->getEntityController()->getTranslationSupervisor();
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
    public function setCore(CoreInterface $core): void
    {
        $this->core = $core;
    }
}
