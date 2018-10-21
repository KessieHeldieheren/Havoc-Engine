<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\BoundaryViolation;

use Havoc\Engine\Entity\Boundary\BoundaryCode\BoundaryCodeInterface;
use Havoc\Engine\Entity\EntityInterface;

/**
 * Havoc Engine entity boundary violation.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class BoundaryViolation implements BoundaryViolationInterface
{
    /**
     * Entity.
     *
     * @var EntityInterface
     */
    private $entity;
    
    /**
     * Boundary violation code.
     *
     * @var BoundaryCodeInterface
     */
    private $boundary_code;
    
    /**
     * BoundaryViolation constructor method.
     *
     * @param EntityInterface $entity
     * @param BoundaryCodeInterface $boundary_code
     */
    public function __construct(EntityInterface $entity, BoundaryCodeInterface $boundary_code)
    {
        $this->setEntity($entity);
        $this->setBoundaryCode($boundary_code);
    }
    
    /**
     * Returns entity.
     *
     * @return EntityInterface
     */
    public function getEntity(): EntityInterface
    {
        return $this->entity;
    }
    
    /**
     * Sets entity.
     *
     * @param EntityInterface $entity
     */
    public function setEntity(EntityInterface $entity): void
    {
        $this->entity = $entity;
    }
    
    /**
     * Returns boundary_code.
     *
     * @return BoundaryCodeInterface
     */
    public function getBoundaryCode(): BoundaryCodeInterface
    {
        return $this->boundary_code;
    }
    
    /**
     * Sets boundary_code.
     *
     * @param BoundaryCodeInterface $boundary_code
     */
    public function setBoundaryCode(BoundaryCodeInterface $boundary_code): void
    {
        $this->boundary_code = $boundary_code;
    }
}
