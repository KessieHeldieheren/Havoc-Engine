<?php
declare(strict_types=1);

namespace Havoc\Engine\Save\SaveStorage;

/**
 * Havoc Engine save storage interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface SaveStorageInterface
{
    /**
     * Add a save to storage.
     *
     * @param string $identifier
     */
    public function addSaveToStorage(string $identifier): void;
    
    /**
     * Retrieve a save from storage.
     */
    public function retrieveSavesFromStorage(): void;
}
