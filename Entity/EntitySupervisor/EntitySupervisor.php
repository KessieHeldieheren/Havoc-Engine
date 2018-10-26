<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\EntitySupervisor;

use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Entity\Entity;
use Havoc\Engine\Entity\EntityCollection\EntityCollectionFactory;
use Havoc\Engine\Entity\EntityCollection\EntityCollectionInterface;
use Havoc\Engine\Entity\EntityFactory;
use Havoc\Engine\Entity\EntityInterface;
use Havoc\Engine\Logger\LogController\LogControllerInterface;

/**
 * Havoc Engine entity supervisor.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class EntitySupervisor implements EntitySupervisorInterface
{
    public const CREATED_ENTITY = "Created entity %s (#%s, %s) at coordinates %s.";
    public const DELETED_ENTITY = "Deleted entity %s (#%s, %s).";
    
    /**
     * World entities.
     *
     * @var EntityCollectionInterface
     */
    private $entity_collection;
    
    /**
     * Log controller.
     *
     * @var LogControllerInterface
     */
    private $log_controller;
    
    /**
     * EntityCollection constructor method.
     *
     * @param LogControllerInterface $log_controller
     */
    public function __construct(LogControllerInterface $log_controller)
    {
        $this->setLogController($log_controller);
        $this->setEntityCollection(EntityCollectionFactory::new());
    }
    
    /**
     * @param string $search_class
     * @return EntityInterface[]
     */
    public function getByClass(string $search_class): array
    {
        $entities = $this->getEntityCollection();
        $result = [];
        
        foreach ($entities as $entity) {
            if ($search_class === \get_class($entity)) {
                $result[] = $entity;
            }
        }
        
        return $result;
    }
    
    /**
     * Create a new entity.
     *
     * @param string $name
     * @param CoordinatesInterface $coordinates
     * @param string $icon
     * @param array $types
     * @param string $entity_class
     * @return EntityInterface
     * @throws \ReflectionException
     */
    public function create(string $name, CoordinatesInterface $coordinates, string $icon, array $types = [], string $entity_class = Entity::class): EntityInterface
    {
        $id = $this->getNewKey();
        
        $entity = EntityFactory::newEntity(
            $entity_class,
            $id,
            $name,
            $coordinates,
            $icon
        );
        
        $this->getEntityCollection()->add($entity);
        
        if ($types !== null) {
            $entity->getTypeCollection()->addTypes($types);
        }
        
        $this->getLogController()->addLog(
            [
                $entity->getName(),
                $entity->getId(),
                $entity->getIcon(),
                $entity->getCoordinates()->string()
            ],
            self::CREATED_ENTITY,
            self::class
        );
        
        return $entity;
    }
    
    /**
     * Attempts to silently delete an entity. No errors occur on failure.
     *
     * @param EntityInterface $entity
     */
    public function delete(EntityInterface $entity): void
    {
        $this->getEntityCollection()->delete($entity);
        
        $this->getLogController()->addLog(
            [
                $entity->getName(),
                $entity->getId(),
                $entity->getIcon()
            ],
            self::DELETED_ENTITY,
            self::class
        );
    }
    
    /**
     * Returns entities.
     *
     * @return EntityCollectionInterface
     */
    public function getEntityCollection(): EntityCollectionInterface
    {
        return $this->entity_collection;
    }
    
    /**
     * Sets entity_collection.
     *
     * @param EntityCollectionInterface $entity_collection
     */
    public function setEntityCollection(EntityCollectionInterface $entity_collection): void
    {
        $this->entity_collection = $entity_collection;
    }
    
    /**
     * Returns logger.
     *
     * @return LogControllerInterface
     */
    public function getLogController(): LogControllerInterface
    {
        return $this->log_controller;
    }
    
    /**
     * Sets logger.
     *
     * @param LogControllerInterface $log_controller
     */
    public function setLogController(LogControllerInterface $log_controller): void
    {
        $this->log_controller = $log_controller;
    }
    
    /**
     * Returns the last key plus 1.
     *
     * @return int
     */
    protected function getNewKey(): int
    {
        $entity_collection = $this->getEntityCollection()->getEntities();
        
        end($entity_collection);
    
        return (int) key($entity_collection) + 1;
    }
}
