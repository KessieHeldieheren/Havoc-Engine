<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity;

/**
 * Havoc Engine entity controller log messages.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
abstract class EntityLogMessage
{
    public const CREATED_ENTITY = "Created entity #%s: %s (%s) at coordinates %s.";
    public const DELETED_ENTITY = "Deleted entity #%s: %s.";
}
