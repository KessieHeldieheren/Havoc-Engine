<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Config\DefaultConfig;
use Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface;
use Havoc\Engine\Entity\Boundary\BoundaryRules\BoundaryRule;
use Havoc\Engine\Entity\Boundary\BoundaryRules\BoundaryRulesFactory;
use Havoc\Engine\Entity\Boundary\BoundaryRules\BoundaryRulesInterface;
use Havoc\Engine\Entity\Type\TypeCollection\TypeCollectionFactory;
use Havoc\Engine\Entity\Type\TypeCollection\TypeCollectionInterface;
use Havoc\Engine\WorldPoint\WorldPointInterface;

/**
 * Havoc Engine entity base.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class Entity implements EntityInterface, WorldPointInterface
{
    /**
     * Entity ID.
     *
     * @var int
     */
    private $id;
    
    /**
     * Entity name.
     *
     * @var string
     */
    private $name;
    
    /**
     * Entity coordinates.
     *
     * @var CartesianCoordinatesInterface
     */
    private $coordinates;
    
    /**
     * Entity initial spawn coordinates.
     *
     * @var CartesianCoordinatesInterface
     */
    private $initial_coordinates;
    
    /**
     * Entity last coordinates.
     *
     * @var \Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface
     */
    private $last_coordinates;
    
    /**
     * World point display icon.
     *
     * @var string
     */
    private $icon = DefaultConfig::WORLD_POINT_NORMAL_ICON;
    
    /**
     * Entity type collection.
     *
     * @var TypeCollectionInterface
     */
    private $type_collection;
    
    /**
     * Boundary rules.
     *
     * @var BoundaryRulesInterface
     */
    private $boundary_rules;
    
    /**
     * Visibility of the entity. If false, the entity will not be shown on the grid.
     *
     * @var bool
     */
    private $visible = true;
    
    /**
     * EntityBase constructor method.
     *
     * @param int $id
     * @param string $name
     * @param CartesianCoordinatesInterface $coordinates
     * @param string $icon
     */
    public function __construct(int $id, string $name, CartesianCoordinatesInterface $coordinates, string $icon)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setInitialCoordinates($coordinates);
        $this->setIcon($icon);
        $this->setTypeCollection(TypeCollectionFactory::new());
        $this->setBoundaryRules(BoundaryRulesFactory::new(
            BoundaryRule::CLAMP,
            BoundaryRule::CLAMP,
            BoundaryRule::CLAMP,
            BoundaryRule::CLAMP
        ));
    }
    
    /**
     * Returns id.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    
    /**
     * Sets id.
     *
     * @param int $id
     */
    public function setId(int $id): void
    {
        if ($this->id !== null) {
            throw EntityException::entityIdAlreadySet($this->id);
        }
        
        $this->id = $id;
    }
    
    /**
     * Returns name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * Sets name.
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    
    /**
     * Returns coordinates.
     *
     * @return CartesianCoordinatesInterface
     */
    public function getCoordinates(): CartesianCoordinatesInterface
    {
        return $this->coordinates;
    }
    
    /**
     * Sets coordinates.
     *
     * @param \Havoc\Engine\Coordinates\Cartesian\CartesianCoordinatesInterface $coordinates
     */
    public function setCoordinates(CartesianCoordinatesInterface $coordinates): void
    {
        $this->setLastCoordinates($this->getCoordinates());
        $this->coordinates = $coordinates;
    }
    
    /**
     * Returns initial_coordinates.
     *
     * @return CartesianCoordinatesInterface
     */
    public function getInitialCoordinates(): CartesianCoordinatesInterface
    {
        return $this->initial_coordinates;
    }
    
    /**
     * Sets initial_coordinates.
     *
     * @param CartesianCoordinatesInterface $coordinates
     */
    protected function setInitialCoordinates(CartesianCoordinatesInterface $coordinates): void
    {
        $this->initial_coordinates = $coordinates->clone();
        $this->last_coordinates = $coordinates->clone();
        $this->coordinates = $coordinates;
    }
    
    /**
     * Returns last_coordinates.
     *
     * @return CartesianCoordinatesInterface
     */
    public function getLastCoordinates(): CartesianCoordinatesInterface
    {
        return $this->last_coordinates;
    }
    
    /**
     * Sets last_coordinates.
     *
     * @param CartesianCoordinatesInterface $coordinates
     */
    protected function setLastCoordinates(CartesianCoordinatesInterface $coordinates): void
    {
        $this->last_coordinates = $coordinates->clone();
    }
    
    /**
     * Returns display icon.
     *
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }
    
    /**
     * Sets display icon.
     *
     * @param string $icon
     */
    public function setIcon(string $icon): void
    {
        $this->icon = $icon;
    }
    
    /**
     * Returns type_collection.
     *
     * @return TypeCollectionInterface
     */
    public function getTypeCollection(): TypeCollectionInterface
    {
        return $this->type_collection;
    }
    
    /**
     * Sets type_collection.
     *
     * @param TypeCollectionInterface $type_collection
     */
    protected function setTypeCollection(TypeCollectionInterface $type_collection): void
    {
        $this->type_collection = $type_collection;
    }
    
    /**
     * Returns boundary_rules.
     *
     * @return BoundaryRulesInterface
     */
    public function getBoundaryRules(): BoundaryRulesInterface
    {
        return $this->boundary_rules;
    }
    
    /**
     * Sets boundary_rules.
     *
     * @param BoundaryRulesInterface $boundary_rules
     */
    protected function setBoundaryRules(BoundaryRulesInterface $boundary_rules): void
    {
        $this->boundary_rules = $boundary_rules;
    }
    
    /**
     * Returns visible.
     *
     * @return bool
     */
    public function isVisible(): bool
    {
        return $this->visible;
    }
    
    /**
     * Sets visible.
     *
     * @param bool $visible
     */
    public function setVisible(bool $visible): void
    {
        $this->visible = $visible;
    }
    
    /**
     * Callable: on boundary collision.
     *
     * @param int $boundary_code
     */
    public function onBoundaryCollision(int $boundary_code): void {}
}
