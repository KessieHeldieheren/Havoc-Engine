<?php
declare(strict_types=1);

namespace Havoc\Engine\Api;

use Havoc\Engine\Config\ConfigControllerInterface;
use Havoc\Engine\Core\CoreInterface;
use Havoc\Engine\Core\Systems\ControllersInterface;
use Havoc\Engine\Entity\EntitySupervisorInterface;
use Havoc\Engine\Entity\Translation\TranslationSupervisorInterface;
use Havoc\Engine\Entity\Type\TypeSupervisorInterface;
use Havoc\Engine\Logger\LogControllerInterface;
use Havoc\Engine\Render\RenderInterface;
use Havoc\Engine\Tick\TickControllerInterface;
use Havoc\Engine\World\WorldControllerInterface;

/**
 * Havoc Core API interface.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
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
}
