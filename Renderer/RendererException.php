<?php
declare(strict_types=1);

namespace Havoc\Engine\Renderer;

use Havoc\Engine\Exceptions\HavocEngineException;

/**
 * Havoc Engine renderer exceptions.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class RendererException extends HavocEngineException
{
    public const RENDERER_BAD_CLASS = 0x1;
    
    /**
     * @param string $given_class
     * @return RendererException
     */
    public static function rendererBadClass(string $given_class): self
    {
        $required_class = RendererInterface::class;
        
        return new self (
            sprintf("Cannot create a renderer using %s, as it must implement %s.", $given_class, $required_class),
            self::RENDERER_BAD_CLASS
        );
    }
}
