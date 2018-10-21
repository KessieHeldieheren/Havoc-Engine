<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Boundary\Rectifier;

use Havoc\Engine\Entity\EntityInterface;
use Havoc\Engine\Grid\Boundary\BoundaryInterface;

/**
 * Havoc Engine entity boundary rectifier for looping.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class RectifierLoop implements RectifierInterface
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
        $this->getEntity()->getCoordinates()->setX($this->getBoundary()->getXPositive());
    }
    
    /**
     * Rectify the entity on the X Positive bound.
     */
    public function rectifyXPositive(): void
    {
        $this->getEntity()->getCoordinates()->setX($this->getBoundary()->getXNegative());
    }
    
    /**
     * Rectify the entity on the Y Negative bound.
     */
    public function rectifyYNegative(): void
    {
        $this->getEntity()->getCoordinates()->setY($this->getBoundary()->getYPositive());
    }
    
    /**
     * Rectify the entity on the Y Positive bound.
     */
    public function rectifyYPositive(): void
    {
        $this->getEntity()->getCoordinates()->setY($this->getBoundary()->getYNegative());
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
