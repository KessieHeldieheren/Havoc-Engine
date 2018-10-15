<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Config\DefaultConfig;
use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Entity\Type\TypeCollectionInterface;
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
        $this->setCoordinates($coordinates);
        $this->setIcon($icon);
        $this->setTypeCollection(TypeFactory::newTypeCollection());
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
        $this->coordinates = $coordinates;
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
    public function setTypeCollection(TypeCollectionInterface $type_collection): void
    {
        $this->type_collection = $type_collection;
    }
}
