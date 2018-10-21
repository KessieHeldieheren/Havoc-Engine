<?php
declare(strict_types=1);

namespace Havoc\Engine\Api;

/**
 * Havoc Engine API factory.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
class ApiFactory
{
    /**
     * Create a new core engine API.
     *
     * @return ApiInterface
     */
    public static function new(): ApiInterface
    {
        return new Api();
    }
}
