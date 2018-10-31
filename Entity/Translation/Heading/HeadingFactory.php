<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation\Heading;

/**
 * Havoc Engine entity translation heading factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class HeadingFactory
{
    /**
     * Create a new heading.
     *
     * @param float $degrees
     * @return HeadingInterface
     */
    public static function new(float $degrees): HeadingInterface
    {
        return new Heading($degrees);
    }
}
