<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\BoundaryRectifier\BoundaryRectifierHide;

use Havoc\Engine\Entity\Boundary\BoundaryInterface;
use Havoc\Engine\Entity\Boundary\BoundaryRectifier\BoundaryRectifierInterface;
use Havoc\Engine\Entity\EntityInterface;

/**
 * Havoc Engine entity boundary rectifier for force-hiding entities.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class BoundaryRectifierHide implements BoundaryRectifierInterface
{
    /**
     * Entity.
     *
     * @var EntityInterface
     */
    private $entity;
    
    /**
     * Boundary.
     *
     * @var BoundaryInterface
     */
    private $boundary;
    
    /**
     * RectifierClamper constructor method.
     *
     * @param EntityInterface $entity
     * @param BoundaryInterface $boundary
     */
    public function __construct(EntityInterface $entity, BoundaryInterface $boundary)
    {
        $this->setEntity($entity);
        $this->setBoundary($boundary);
    }
    
    /**
     * Rectify the entity on the X Negative bound.
     */
    public function rectifyXNegative(): void
    {
        $this->hideEntity();
    }
    
    /**
     * Rectify the entity on the X Positive bound.
     */
    public function rectifyXPositive(): void
    {
        $this->hideEntity();
    }
    
    /**
     * Rectify the entity on the Y Negative bound.
     */
    public function rectifyYNegative(): void
    {
        $this->hideEntity();
    }
    
    /**
     * Rectify the entity on the Y Positive bound.
     */
    public function rectifyYPositive(): void
    {
        $this->hideEntity();
    }
    
    /**
     * Hide the entity.
     */
    protected function hideEntity(): void
    {
        $this->getEntity()->setVisible(false);
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
     * Returns boundary.
     *
     * @return BoundaryInterface
     */
    public function getBoundary(): BoundaryInterface
    {
        return $this->boundary;
    }
    
    /**
     * Sets boundary.
     *
     * @param BoundaryInterface $boundary
     */
    public function setBoundary(BoundaryInterface $boundary): void
    {
        $this->boundary = $boundary;
    }
}
