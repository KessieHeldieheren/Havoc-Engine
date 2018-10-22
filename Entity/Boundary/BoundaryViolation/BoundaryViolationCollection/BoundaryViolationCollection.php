<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\BoundaryViolation\BoundaryViolationCollection;

use Havoc\Engine\Entity\Boundary\BoundaryViolation\BoundaryViolationFactory;
use Havoc\Engine\Entity\Boundary\BoundaryViolation\BoundaryViolationInterface;
use Havoc\Engine\Entity\Boundary\BoundaryCode\BoundaryCodeFactory;
use Havoc\Engine\Entity\EntityInterface;

/**
 * Havoc Engine entity boundary violation collection.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class BoundaryViolationCollection implements BoundaryViolationCollectionInterface
{
    /**
     * Boundary violations.
     *
     * @var BoundaryViolationInterface[]
     */
    private $violations = [];
    
    /**
     * Get all violations.
     *
     * @return BoundaryViolationInterface[]
     */
    public function getViolations(): array
    {
        return $this->violations;
    }
    
    /**
     * Add a violation.
     *
     * @param EntityInterface $entity
     * @param int $boundary_code
     */
    public function addViolation(EntityInterface $entity, int $boundary_code): void
    {
        $boundary_violation = BoundaryViolationFactory::new(
            $entity,
            BoundaryCodeFactory::new($boundary_code)
        );
        
        $this->violations[] = $boundary_violation;
    }
    
    /**
     * Wipe all violations.
     */
    public function cleanViolations(): void
    {
        $this->violations = [];
    }
}
