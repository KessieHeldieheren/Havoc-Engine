<?php
declare(strict_types=1);

namespace Havoc\Engine\Core\Systems;

/**
 * Havoc Core systems supervisors interface.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
interface SupervisorsInterface
{
    /**
     * Returns type_supervisor.
     *
     * @return string
     */
    public function getTypeSupervisor(): string;
    
    /**
     * Sets type_supervisor.
     *
     * @param string $type_supervisor
     */
    public function setTypeSupervisor(string $type_supervisor): void;
    
    /**
     * Returns translation_supervisor.
     *
     * @return string
     */
    public function getTranslationSupervisor(): string;
    
    /**
     * Sets translation_supervisor.
     *
     * @param string $translation_supervisor
     */
    public function setTranslationSupervisor(string $translation_supervisor): void;
    
    /**
     * Returns boundary_supervisor.
     *
     * @return string
     */
    public function getBoundarySupervisor(): string;
    
    /**
     * Sets boundary_supervisor.
     *
     * @param string $boundary_supervisor
     */
    public function setBoundarySupervisor(string $boundary_supervisor): void;
    
    /**
     * Returns entity_supervisor.
     *
     * @return string
     */
    public function getEntitySupervisor(): string;
    
    /**
     * Sets entity_supervisor.
     *
     * @param string $entity_supervisor
     */
    public function setEntitySupervisor(string $entity_supervisor): void;
}
