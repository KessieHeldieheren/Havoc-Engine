<?php
declare(strict_types=1);

namespace Havoc\Engine\Core\Systems;

use Havoc\Engine\Entity\Boundary\BoundarySupervisor;
use Havoc\Engine\Entity\EntitySupervisor;
use Havoc\Engine\Entity\Translation\TranslationSupervisor;
use Havoc\Engine\Entity\Type\TypeSupervisor;

/**
 * Havoc Core systems supervisors.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class Supervisors implements SupervisorsInterface
{
    /**
     * Entity type supervisor.
     *
     * @var string
     */
    private $type_supervisor = TypeSupervisor::class;
    
    /**
     * Translation supervisor.
     *
     * @var string
     */
    private $translation_supervisor = TranslationSupervisor::class;
    
    /**
     * Boundary supervisor.
     *
     * @var string
     */
    private $boundary_supervisor = BoundarySupervisor::class;
    
    /**
     * Entity supervisor.
     *
     * @var string
     */
    private $entity_supervisor = EntitySupervisor::class;
    
    /**
     * Returns type_supervisor.
     *
     * @return string
     */
    public function getTypeSupervisor(): string
    {
        return $this->type_supervisor;
    }
    
    /**
     * Sets type_supervisor.
     *
     * @param string $type_supervisor
     */
    public function setTypeSupervisor(string $type_supervisor): void
    {
        $this->type_supervisor = $type_supervisor;
    }
    
    /**
     * Returns translation_supervisor.
     *
     * @return string
     */
    public function getTranslationSupervisor(): string
    {
        return $this->translation_supervisor;
    }
    
    /**
     * Sets translation_supervisor.
     *
     * @param string $translation_supervisor
     */
    public function setTranslationSupervisor(string $translation_supervisor): void
    {
        $this->translation_supervisor = $translation_supervisor;
    }
    
    /**
     * Returns boundary_supervisor.
     *
     * @return string
     */
    public function getBoundarySupervisor(): string
    {
        return $this->boundary_supervisor;
    }
    
    /**
     * Sets boundary_supervisor.
     *
     * @param string $boundary_supervisor
     */
    public function setBoundarySupervisor(string $boundary_supervisor): void
    {
        $this->boundary_supervisor = $boundary_supervisor;
    }
    
    /**
     * Returns entity_supervisor.
     *
     * @return string
     */
    public function getEntitySupervisor(): string
    {
        return $this->entity_supervisor;
    }
    
    /**
     * Sets entity_supervisor.
     *
     * @param string $entity_supervisor
     */
    public function setEntitySupervisor(string $entity_supervisor): void
    {
        $this->entity_supervisor = $entity_supervisor;
    }
}
