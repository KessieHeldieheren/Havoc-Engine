<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Entity\Type\TypeCollectionInterface;

/**
 * Havoc Engine entity interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
interface EntityInterface
{
    /**
     * EntityBase constructor method.
     *
     * @param int $id
     * @param string $name
     * @param CoordinatesInterface $coordinates
     * @param string $icon
     */
    public function __construct(int $id, string $name, CoordinatesInterface $coordinates, string $icon);
    
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
     * Returns coordinates.
     *
     * @return CoordinatesInterface
     */
    public function getCoordinates(): CoordinatesInterface;
    
    /**
     * Sets coordinates.
     *
     * @param CoordinatesInterface $coordinates
     */
    public function setCoordinates(CoordinatesInterface $coordinates): void;
    
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
     * Returns type_collection.
     *
     * @return TypeCollectionInterface
     */
    public function getTypeCollection(): TypeCollectionInterface;
    
    /**
     * Sets type_collection.
     *
     * @param TypeCollectionInterface $type_collection
     */
    public function setTypeCollection(TypeCollectionInterface $type_collection): void;
}
