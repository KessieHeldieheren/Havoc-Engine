<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\BoundaryViolation;

use Havoc\Engine\Entity\EntityInterface;

/**
 * Havoc Engine entity boundary violation collection interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface BoundaryViolationCollectionInterface
{
    /**
     * Get all violations.
     *
     * @return BoundaryViolationInterface[]
     */
    public function getViolations(): array;
    
    /**
     * Add a violation.
     *
     * @param EntityInterface $entity
     * @param int $boundary_code
     */
    public function addViolation(EntityInterface $entity, int $boundary_code): void;
    
    /**
     * Wipe all violations.
     */
    public function cleanViolations(): void;
}
