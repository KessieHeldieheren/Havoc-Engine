<?php
declare(strict_types=1);

namespace Havoc\Engine;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Engine\Engine;
use Havoc\Engine\Engine\EngineInterface;
use Havoc\Engine\Entity\EntityCollectionInterface;
use Havoc\Engine\Entity\Translation\TranslationControllerInterface;
use Havoc\Engine\Entity\Type\TypeControllerInterface;
use Havoc\Engine\Logger\LogControllerInterface;
use Havoc\Engine\Render\RenderInterface;
use Havoc\Engine\Tick\TickControllerInterface;
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
 * @version 1.0.0
 */
class Api
{
    /**
     * Havoc game engine.
     *
     * @var EngineInterface
     */
    private $core;
    
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
        
        $world_controller->getGrid()->insertEmptyPoints();
        $entity_controller->mapEntitiesToGrid();
        $world_controller->getRenderer()->render();
        
        return $world_controller->getRender();
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
     * @return EntityCollectionInterface
     */
    public function entities(): EntityCollectionInterface
    {
        return $this->getCore()->getEntityController()->getEntityCollection();
    }
    
    /**
     * Returns the entity type controller.
     *
     * @return TypeControllerInterface
     */
    public function types(): TypeControllerInterface
    {
        return $this->getCore()->getEntityController()->getTypeController();
    }
    
    /**
     * Returns the entity translation controller.
     *
     * @return TranslationControllerInterface
     */
    public function translator(): TranslationControllerInterface
    {
        return $this->getCore()->getEntityController()->getTranslationController();
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
     * Api constructor method.
     */
    public function __construct()
    {
        $this->setCore(new Engine());
    }
    
    /**
     * Returns engine.
     *
     * @return EngineInterface
     */
    public function getCore(): EngineInterface
    {
        return $this->core;
    }
    
    /**
     * Sets engine.
     *
     * @param EngineInterface $core
     */
    public function setCore(EngineInterface $core): void
    {
        $this->core = $core;
    }
}
