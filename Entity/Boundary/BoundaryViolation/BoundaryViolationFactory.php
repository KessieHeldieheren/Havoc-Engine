<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\BoundaryViolation;

use Havoc\Engine\Entity\Boundary\BoundaryCode\BoundaryCodeInterface;
use Havoc\Engine\Entity\EntityInterface;

/**
 * Havoc Engine entity boundary violation factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class BoundaryViolationFactory
{
    /**
     * Create a new boundary violation.
     *
     * @param EntityInterface $entity
     * @param BoundaryCodeInterface $boundary_code
     * @return BoundaryViolationInterface
     */
    public static function new(EntityInterface $entity, BoundaryCodeInterface $boundary_code): BoundaryViolationInterface
    {
        return new BoundaryViolation($entity, $boundary_code);
    }
}
