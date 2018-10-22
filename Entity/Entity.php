<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Config\DefaultConfig;
use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Entity\Boundary\BoundaryRules\BoundaryRule;
use Havoc\Engine\Entity\Boundary\BoundaryRules\RulesFactory;
use Havoc\Engine\Entity\Boundary\BoundaryRules\RulesInterface;
use Havoc\Engine\Entity\Type\TypeCollection\TypeCollectionFactory;
use Havoc\Engine\Entity\Type\TypeCollection\TypeCollectionInterface;
use Havoc\Engine\Entity\Type\TypeFactory;
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
     * @var CoordinatesInterface
     */
    private $coordinates;
    
    /**
     * Entity initial spawn coordinates.
     *
     * @var CoordinatesInterface
     */
    private $initial_coordinates;
    
    /**
     * Entity last coordinates.
     *
     * @var CoordinatesInterface
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
     * @var \Havoc\Engine\Entity\Boundary\BoundaryRules\RulesInterface
     */
    private $boundary_rules;
    
    /**
     * EntityBase constructor method.
     *
     * @param int $id
     * @param string $name
     * @param CoordinatesInterface $coordinates
     * @param string $icon
     */
    public function __construct(int $id, string $name, CoordinatesInterface $coordinates, string $icon)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setInitialCoordinates($coordinates);
        $this->setIcon($icon);
        $this->setTypeCollection(TypeCollectionFactory::new());
        $this->setBoundaryRules(RulesFactory::new(
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
        if (null !== $this->id) {
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
     * @return CoordinatesInterface
     */
    public function getCoordinates(): CoordinatesInterface
    {
        return $this->coordinates;
    }
    
    /**
     * Sets coordinates.
     *
     * @param CoordinatesInterface $coordinates
     */
    public function setCoordinates(CoordinatesInterface $coordinates): void
    {
        $this->setLastCoordinates($this->getCoordinates());
        $this->coordinates = $coordinates;
    }
    
    /**
     * Returns initial_coordinates.
     *
     * @return CoordinatesInterface
     */
    public function getInitialCoordinates(): CoordinatesInterface
    {
        return $this->initial_coordinates;
    }
    
    /**
     * Sets initial_coordinates.
     *
     * @param CoordinatesInterface $coordinates
     */
    protected function setInitialCoordinates(CoordinatesInterface $coordinates): void
    {
        $this->initial_coordinates = $coordinates->clone();
        $this->last_coordinates = $coordinates->clone();
        $this->coordinates = $coordinates;
    }
    
    /**
     * Returns last_coordinates.
     *
     * @return CoordinatesInterface
     */
    public function getLastCoordinates(): CoordinatesInterface
    {
        return $this->last_coordinates;
    }
    
    /**
     * Sets last_coordinates.
     *
     * @param CoordinatesInterface $coordinates
     */
    protected function setLastCoordinates(CoordinatesInterface $coordinates): void
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
     * @return \Havoc\Engine\Entity\Type\TypeCollection\TypeCollectionInterface
     */
    public function getTypeCollection(): TypeCollectionInterface
    {
        return $this->type_collection;
    }
    
    /**
     * Sets type_collection.
     *
     * @param \Havoc\Engine\Entity\Type\TypeCollection\TypeCollectionInterface $type_collection
     */
    public function setTypeCollection(TypeCollectionInterface $type_collection): void
    {
        $this->type_collection = $type_collection;
    }
    
    /**
     * Returns boundary_rules.
     *
     * @return RulesInterface
     */
    public function getBoundaryRules(): RulesInterface
    {
        return $this->boundary_rules;
    }
    
    /**
     * Sets boundary_rules.
     *
     * @param \Havoc\Engine\Entity\Boundary\BoundaryRules\RulesInterface $boundary_rules
     */
    public function setBoundaryRules(RulesInterface $boundary_rules): void
    {
        $this->boundary_rules = $boundary_rules;
    }
}
