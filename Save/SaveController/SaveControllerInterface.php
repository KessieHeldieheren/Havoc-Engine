<?php
declare(strict_types=1);

namespace Havoc\Engine\Save\SaveController;

use Havoc\Engine\Save\SaveCollection\SaveCollectionInterface;
use Havoc\Engine\Save\SaveStorage\SaveStorageInterface;

/**
 * Havoc Engine save controller interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface SaveControllerInterface
{
    /**
     * Returns save_storage.
     *
     * @return SaveStorageInterface
     */
    public function getSaveStorage(): SaveStorageInterface;
    
    /**
     * Returns save_collection.
     *
     * @return SaveCollectionInterface
     */
    public function getSaveCollection(): SaveCollectionInterface;
}
