<?php
declare(strict_types=1);

namespace Havoc\Engine\Save\SaveCollection;

use Havoc\Engine\Core\CoreInterface;

/**
 * Havoc Engine save collection interface.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
interface SaveCollectionInterface
{
    /**
     * Add an engine state to save.
     *
     * @param string $identifier
     * @param CoreInterface $core
     */
    public function addSavedState(string $identifier, CoreInterface $core): void;
    
    /**
     * Retrieve an engine state.
     *
     * @param string $identifier
     * @return CoreInterface
     */
    public function getSavedState(string $identifier): CoreInterface;
    
    /**
     * Sets saved_states.
     *
     * @param string[] $saved_states
     */
    public function setSavedStates(array $saved_states): void;
    
    /**
     * Returns saved_states.
     *
     * @return string[]
     */
    public function getSavedStates(): array;
}
