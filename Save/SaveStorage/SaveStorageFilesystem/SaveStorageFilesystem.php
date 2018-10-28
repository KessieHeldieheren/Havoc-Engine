<?php
declare(strict_types=1);

namespace Havoc\Engine\Save\SaveStorage\SaveStorageFilesystem;

use Havoc\Engine\Save\SaveCollection\SaveCollectionInterface;
use Havoc\Engine\Save\SaveStorage\SaveStorageInterface;

/**
 * Havoc Engine filesystem-based save storage.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class SaveStorageFilesystem implements SaveStorageInterface
{
    public const EXTENSION = ".hvcs";
    
    /**
     * Save collection.
     *
     * @var SaveCollectionInterface
     */
    private $save_collection;
    
    /**
     * Save location.
     *
     * @var string
     */
    private $location = "";
    
    /**
     * SaveStorageFilesystem constructor method.
     *
     * @param SaveCollectionInterface $save_collection
     */
    public function __construct(SaveCollectionInterface $save_collection)
    {
        $this->setSaveCollection($save_collection);
        
    }
    
    /**
     * Add a save to storage.
     *
     * @param string $identifier
     */
    public function addSaveToStorage(string $identifier): void
    {
        $file_path = $this->getLocation() . $identifier . self::EXTENSION;
        $save = $this->getSaveCollection()->getSavedState($identifier);
        
        file_put_contents($file_path, $save);
    }
    
    /**
     * Retrieve a save from storage.
     */
    public function retrieveSavesFromStorage(): void
    {
        $location = rtrim($this->getLocation(), "/");
        $files = glob($location . "/*" . self::EXTENSION);
        
        foreach ($files as $file) {
            echo $file . PHP_EOL;
        }
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
     * Returns location.
     *
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }
    
    /**
     * Sets location.
     *
     * @param string $location
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }
}
