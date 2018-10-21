<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary;

use Havoc\Engine\Entity\EntityInterface;
use Havoc\Engine\Grid\Boundary\BoundaryInterface;

/**
  * Havoc Engine entity boundary rectifier for clamp rule.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class BoundaryRectifierClamp
{
    /**
     * Clamp entity to the X Negative bound.
     *
     * @param EntityInterface $entity
     * @param BoundaryInterface $boundary
     */
    public static function rectifyXNegative(EntityInterface $entity, BoundaryInterface $boundary): void
    {
        $entity->getCoordinates()->setX($boundary->getXNegative());
    }
    
    /**
     * Clamp entity to the X Positive bound.
     *
     * @param EntityInterface $entity
     * @param BoundaryInterface $boundary
     */
    public static function rectifyXPositive(EntityInterface $entity, BoundaryInterface $boundary): void
    {
        $entity->getCoordinates()->setX($boundary->getXPositive());
    }
    
    /**
     * Clamp entity to the Y Negative bound.
     *
     * @param EntityInterface $entity
     * @param BoundaryInterface $boundary
     */
    public static function rectifyYNegative(EntityInterface $entity, BoundaryInterface $boundary): void
    {
        $entity->getCoordinates()->setY($boundary->getYNegative());
    }
    
    /**
     * Clamp entity to the Y Positive bound.
     *
     * @param EntityInterface $entity
     * @param BoundaryInterface $boundary
     */
    public static function rectifyYPositive(EntityInterface $entity, BoundaryInterface $boundary): void
    {
        $entity->getCoordinates()->setY($boundary->getYPositive());
    }
}
