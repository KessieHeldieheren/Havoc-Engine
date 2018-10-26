<?php
declare(strict_types=1);

namespace Havoc\Engine\Api;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Core\CoreInterface;
use Havoc\Engine\Core\Controllers\ControllersInterface;
use Havoc\Engine\Entity\Boundary\BoundaryInterface;
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
 * Havoc Engine API interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface ApiInterface
{
    /**
     * Render world and return result.
     *
     * @return RenderInterface
     */
    public function render(): RenderInterface;
    
    /**
     * Bootstraps the engine core.
     *
     * @throws \ReflectionException
     */
    public function bootstrap(): void;
    
    /**
     * Returns the system controllers collection.
     *
     * @return ControllersInterface
     */
    public function controllers(): ControllersInterface;
    
    /**
     * Returns the configuration controller.
     *
     * @return ConfigControllerInterface
     */
    public function config(): ConfigControllerInterface;
    
    /**
     * Returns the world controller.
     *
     * @return WorldControllerInterface
     */
    public function world(): WorldControllerInterface;
    
    /**
     * Returns the tick controller.
     *
     * @return TickControllerInterface
     */
    public function tick(): TickControllerInterface;
    
    /**
     * Returns the entity controller.
     *
     * @return EntitySupervisorInterface
     */
    public function entities(): EntitySupervisorInterface;
    
    /**
     * Returns the log controller.
     *
     * @return LogControllerInterface
     */
    public function logger(): LogControllerInterface;
    
    /**
     * Returns the entity type controller.
     *
     * @return TypeSupervisorInterface
     */
    public function types(): TypeSupervisorInterface;
    
    /**
     * Returns the entity translation controller.
     *
     * @return TranslationSupervisorInterface
     */
    public function translation(): TranslationSupervisorInterface;
    
    /**
     * Returns engine.
     *
     * @return CoreInterface
     */
    public function getCore(): CoreInterface;
    
    /**
     * Returns all entities that are out of bounds in the current tick.
     *
     * @return BoundaryViolationCollectionInterface
     */
    public function boundaryViolations(): BoundaryViolationCollectionInterface;
    
    /**
     * Returns the grid view, which allows camera view manipulation.
     *
     * @return GridViewInterface
     */
    public function view(): GridViewInterface;
    
    /**
     * Returns the grid boundary.
     *
     * @return BoundaryInterface
     */
    public function boundary(): BoundaryInterface;
    
    public function refresh(): void;
}
