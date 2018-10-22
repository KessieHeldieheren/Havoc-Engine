<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\BoundaryViolation\BoundaryViolationCollection;

/**
 * Havoc Engine entity boundary violation collection factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class BoundaryViolationCollectionFactory
{
    /**
     * Create a new boundary violation collection.
     *
     * @return BoundaryViolationCollectionInterface
     */
    public static function new(): BoundaryViolationCollectionInterface
    {
        return new BoundaryViolationCollection();
    }
}