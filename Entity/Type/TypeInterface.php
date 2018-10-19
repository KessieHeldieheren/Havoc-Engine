<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Type;

/**
 * Havoc Core entity type interface.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
interface TypeInterface
{
    /**
     * Type constructor method.
     *
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id, string $name);
    
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
}
