<?php
declare(strict_types=1);

namespace Havoc\Engine\Save\SaveController;

use Havoc\Engine\Save\SaveCollection\SaveCollectionFactory;
use Havoc\Engine\Save\SaveCollection\SaveCollectionInterface;
use Havoc\Engine\Save\SaveStorage\SaveStorageInterface;

/**
 * Havoc Engine save controller.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class SaveController implements SaveControllerInterface
{
    /**
     * Save collection.
     *
     * @var SaveCollectionInterface
     */
    private $save_collection;
    
    /**
     * Save storage.
     *
     * @todo permit saving to files/databases.
     *
     * @var SaveStorageInterface
     */
    private $save_storage;
    
    /**
     * SaveController constructor method.
     *
     * @throws \ReflectionException
     */
    public function __construct()
    {
        $this->bootstrap();
    }
    
    /**
     * Bootstrap modules.
     *
     * @throws \ReflectionException
     */
    protected function bootstrap(): void
    {
        $this->setSaveCollection(SaveCollectionFactory::new());
    }
    
    /**
     * Returns save_collection.
     *
     * @return SaveCollectionInterface
     */
    public function getSaveCollection(): SaveCollectionInterface
    {
        return $this->save_collection;
    }
    
    /**
     * Sets save_collection.
     *
     * @param SaveCollectionInterface $save_collection
     */
    public function setSaveCollection(SaveCollectionInterface $save_collection): void
    {
        $this->save_collection = $save_collection;
    }
    
    /**
     * Returns save_storage.
     *
     * @return SaveStorageInterface
     */
    public function getSaveStorage(): SaveStorageInterface
    {
        return $this->save_storage;
    }
    
    /**
     * Sets save_storage.
     *
     * @param SaveStorageInterface $save_storage
     */
    public function setSaveStorage(SaveStorageInterface $save_storage): void
    {
        $this->save_storage = $save_storage;
    }
}
