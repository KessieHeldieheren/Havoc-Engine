<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\BoundaryRectifier;

use Havoc\Engine\Entity\EntityInterface;
use Havoc\Engine\Entity\Boundary\BoundaryInterface;
use ReflectionClass;

/**
  * Havoc Engine entity boundary rectifier factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class BoundaryRectifierFactory
{
    /**
     * Create a new rectifier.
     *
     * @param EntityInterface $entity
     * @param \Havoc\Engine\Entity\Boundary\BoundaryInterface $boundary
     * @param string $rectifier
     * @return BoundaryRectifierInterface
     * @throws \ReflectionException
     */
    public static function new(EntityInterface $entity, BoundaryInterface $boundary, string $rectifier): BoundaryRectifierInterface
    {
        $reflects = (new ReflectionClass($rectifier))->implementsInterface(BoundaryRectifierInterface::class);
        
        if (false === $reflects) {
            throw BoundaryRectifierException::rectifierBadClass($rectifier);
        }
        
        return new $rectifier($entity, $boundary);
    }
}
