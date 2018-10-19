<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

use Havoc\Engine\Coordinates\CoordinatesInterface;
use Havoc\Engine\Logger\LogControllerInterface;
use Havoc\Engine\WorldPoint\WorldPointInterface;

/**
 * Havoc Core entity supervisor.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class EntitySupervisor implements EntitySupervisorInterface
{
    /**
     * World entities.
     *
     * @var EntityInterface[]|WorldPointInterface[]
     */
    private $entities = [];
    
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
        $this->setLogcontroller($log_controller);
    }
    
    /**
     * @param string $search_class
     * @return EntityInterface[]
     */
    public function getByClass(string $search_class): array
    {
        $entities = $this->getEntities();
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
        $entity = EntityFactory::newEntity($entity_class, $id, $name, $coordinates, $icon);
        $this->entities[$id] = $entity;
        
        if (null !== $types) {
            $entity->getTypeCollection()->addTypes($types);
        }
        
        $this->getLogcontroller()->addLog(
            [
                $entity->getName(),
                $entity->getId(),
                $entity->getIcon(),
                $entity->getCoordinates()->string()
            ],
            LogMessage::CREATED_ENTITY,
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
        unset($this->entities[$entity->getId()]);
        
        $this->getLogcontroller()->addLog(
            [
                $entity->getName(),
                $entity->getId(),
                $entity->getIcon()
            ],
            LogMessage::DELETED_ENTITY,
            self::class
        );
    }
    
    /**
     * Returns entities.
     *
     * @return EntityInterface[]|WorldPointInterface[]
     */
    public function getEntities(): array
    {
        return $this->entities;
    }
    
    /**
     * Returns logger.
     *
     * @return LogControllerInterface
     */
    public function getLogcontroller(): LogControllerInterface
    {
        return $this->log_controller;
    }
    
    /**
     * Sets logger.
     *
     * @param LogControllerInterface $log_controller
     */
    public function setLogcontroller(LogControllerInterface $log_controller): void
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
        end($this->entities);
        
        $key = (int) key($this->entities) + 1;
        
        reset($this->entities);
        
        return $key;
    }
}
