<?php
declare(strict_types=1);

namespace Havoc\Engine\Save\SaveCollection;

use Havoc\Engine\Core\CoreInterface;
use Havoc\Engine\Save\SaveException;

/**
 * Havoc Engine save collection.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class SaveCollection implements SaveCollectionInterface
{
    /**
     * Saved engine states.
     *
     * @var string[]
     */
    private $saved_states = [];
    
    /**
     * Returns saved_states.
     *
     * @return string[]
     */
    public function getSavedStates(): array
    {
        return $this->saved_states;
    }
    
    /**
     * Sets saved_states.
     *
     * @param string[] $saved_states
     */
    public function setSavedStates(array $saved_states): void
    {
        $this->saved_states = $saved_states;
    }
    
    /**
     * Add an engine state to save.
     *
     * @param string $identifier
     * @param CoreInterface $core
     */
    public function addSavedState(string $identifier, CoreInterface $core): void
    {
        $this->saved_states[$identifier] = serialize($core);
    }
    
    /**
     * Retrieve an engine state.
     *
     * @param string $identifier
     * @return CoreInterface
     */
    public function getSavedState(string $identifier): CoreInterface
    {
        if (!array_key_exists($identifier, $this->saved_states)) {
            throw SaveException::saveIdentifierInvalid($identifier);
        }
        
        return unserialize($this->saved_states[$identifier], [CoreInterface::class]);
    }
}
