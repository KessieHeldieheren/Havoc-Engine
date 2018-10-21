<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\Rectifier;

use Havoc\Engine\Entity\EntityInterface;
use Havoc\Engine\Grid\Boundary\BoundaryInterface;

/**
 * Havoc Engine entity boundary rectifier interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface RectifierInterface
{
    /**
     * RectifierClamper constructor method.
     *
     * @param EntityInterface $entity
     * @param BoundaryInterface $boundary
     */
    public function __construct(EntityInterface $entity, BoundaryInterface $boundary);
    
    /**
     * Rectify the entity on the X Negative bound.
     */
    public function rectifyXNegative(): void;
    
    /**
     * Rectify the entity on the X Positive bound.
     */
    public function rectifyXPositive(): void;
    
    /**
     * Rectify the entity on the Y Negative bound.
     */
    public function rectifyYNegative(): void;
    
    /**
     * Rectify the entity on the Y Positive bound.
     */
    public function rectifyYPositive(): void;
}
