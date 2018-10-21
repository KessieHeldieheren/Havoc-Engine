<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\Rectifier;

use Havoc\Engine\Entity\EntityInterface;
use Havoc\Engine\Grid\Boundary\BoundaryInterface;
use ReflectionClass;

/**
  * Havoc Engine entity boundary rectifier factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class RectifierFactory
{
    /**
     * Create a new rectifier.
     *
     * @param EntityInterface $entity
     * @param BoundaryInterface $boundary
     * @param string $rectifier
     * @return RectifierInterface
     * @throws \ReflectionException
     */
    public static function new(EntityInterface $entity, BoundaryInterface $boundary, string $rectifier): RectifierInterface
    {
        $reflects = (new ReflectionClass($rectifier))->implementsInterface(RectifierInterface::class);
        
        if (false === $reflects) {
            throw RectifierException::rectifierBadClass($rectifier);
        }
        
        return new $rectifier($entity, $boundary);
    }
}
