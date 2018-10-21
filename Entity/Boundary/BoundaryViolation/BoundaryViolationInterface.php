<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\BoundaryViolation;

use Havoc\Engine\Entity\Boundary\BoundaryCode\BoundaryCodeInterface;
use Havoc\Engine\Entity\EntityInterface;

/**
 * Havoc Engine entity boundary violation interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface BoundaryViolationInterface
{
    /**
     * BoundaryViolation constructor method.
     *
     * @param EntityInterface $entity
     * @param BoundaryCodeInterface $boundary_code
     */
    public function __construct(EntityInterface $entity, BoundaryCodeInterface $boundary_code);
    
    /**
     * Returns entity.
     *
     * @return EntityInterface
     */
    public function getEntity(): EntityInterface;
    
    /**
     * Sets entity.
     *
     * @param EntityInterface $entity
     */
    public function setEntity(EntityInterface $entity): void;
    
    /**
     * Returns boundary_code.
     *
     * @return BoundaryCodeInterface
     */
    public function getBoundaryCode(): BoundaryCodeInterface;
    
    /**
     * Sets boundary_code.
     *
     * @param BoundaryCodeInterface $boundary_code
     */
    public function setBoundaryCode(BoundaryCodeInterface $boundary_code): void;
}
