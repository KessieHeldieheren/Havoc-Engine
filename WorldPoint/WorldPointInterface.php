<?php
declare(strict_types=1);

namespace Havoc\Engine\World;

/**
 * Havoc Engine world point interface.
 *
 * This interface allows objects to be placed on the world grid.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
interface WorldPointInterface
{
    /**
     * Returns display icon.
     *
     * @return string
     */
    public function getIcon(): string;
    
    /**
     * Sets display icon.
     *
     * @param string $display
     */
    public function setIcon(string $display): void;
}