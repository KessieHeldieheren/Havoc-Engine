<?php
declare(strict_types=1);

namespace Havoc\Engine\Entity\Translation;

use Havoc\Engine\Entity\EntityCollectionInterface;

use Havoc\Engine\Grid\GridInterface;
use Havoc\Engine\Logger\LogControllerInterface;
use ReflectionClass;

/**
 * Havoc Engine entity translation controller factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
 */
class TranslationControllerFactory
{
    /**
     * Create a new entity translation controller.
     *
     * @param EntityCollectionInterface $entity_collection
     * @param LogControllerInterface $log_controller
     * @param GridInterface $grid
     * @param string $controller
     * @return TranslationControllerInterface
     * @throws \ReflectionException
     */
    public static function new(EntityCollectionInterface $entity_collection, LogControllerInterface $log_controller, GridInterface $grid, string $controller = TranslationController::class): TranslationControllerInterface
    {
        $reflects = (new ReflectionClass($controller))->implementsInterface(TranslationControllerInterface::class);
        
        if (false === $reflects) {
            throw TranslationException::translationControllerBadClass($controller);
        }
        
        return new $controller($entity_collection, $log_controller, $grid);
    }
}
