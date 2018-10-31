<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface;
use Havoc\Engine\Entity\Boundary\BoundaryRules\BoundaryRulesInterface;
use Havoc\Engine\Entity\Type\TypeCollection\TypeCollectionInterface;

/**
 * Havoc Engine entity interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface EntityInterface
{
    /**
     * EntityBase constructor method.
     *
     * @param int $id
     * @param string $name
     * @param CartesianCoordinatesInterface $coordinates
     * @param string $icon
     */
    public function __construct(int $id, string $name, CartesianCoordinatesInterface $coordinates, string $icon);
    
    /**
     * Returns id.
     *
     * @return int
     */
    public function getId(): int;
    
    /**
     * Sets id.
     *
     * @param int $id
     */
    public function setId(int $id): void;
    
    /**
     * Returns name.
     *
     * @return string
     */
    public function getName(): string;
    
    /**
     * Sets name.
     *
     * @param string $name
     */
    public function setName(string $name): void;
    
    /**
     * Returns display icon.
     *
     * @return string
     */
    public function getIcon(): string;
    
    /**
     * Sets display icon.
     *
     * @param string $icon
     */
    public function setIcon(string $icon): void;
    
    /**
     * Returns coordinates.
     *
     * @return \Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface
     */
    public function getCoordinates(): CartesianCoordinatesInterface;
    
    /**
     * Sets coordinates.
     *
     * @param CartesianCoordinatesInterface $coordinates
     */
    public function setCoordinates(CartesianCoordinatesInterface $coordinates): void;
    
    /**
     * Returns type_collection.
     *
     * @return TypeCollectionInterface
     */
    public function getTypeCollection(): TypeCollectionInterface;
    
    /**
     * Returns initial_coordinates.
     *
     * @return CartesianCoordinatesInterface
     */
    public function getInitialCoordinates(): CartesianCoordinatesInterface;
    
    /**
     * Returns last_coordinates.
     *
     * @return \Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface
     */
    public function getLastCoordinates(): CartesianCoordinatesInterface;
    
    /**
     * Returns boundary_rules.
     *
     * @return BoundaryRulesInterface
     */
    public function getBoundaryRules(): BoundaryRulesInterface;
    
    /**
     * Returns visible.
     *
     * @return bool
     */
    public function isVisible(): bool;
    
    /**
     * Sets visible.
     *
     * @param bool $visible
     */
    public function setVisible(bool $visible): void;
}
