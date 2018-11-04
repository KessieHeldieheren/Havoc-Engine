<?php
declare(strict_types=1);

namespace Havoc\Engine\Render;

use Havoc\Engine\Core\EngineException;

/**
 * Havoc Engine render exceptions.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class RenderException extends EngineException
{
    public const RENDER_BAD_CLASS = 0x1;
    
    /**
     * @param string $given_class
     * @return RenderException
     */
    public static function renderBadClass(string $given_class): self
    {
        $required_class = RenderInterface::class;
        
        return new self (
            sprintf("Cannot create a render using %s, as it must implement %s.", $given_class, $required_class),
            self::RENDER_BAD_CLASS
        );
    }
}
