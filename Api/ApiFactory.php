<?php
declare(strict_types=1);

namespace Havoc\Engine\Api;

/**
 * Havoc Core API factory.
 *
 * @package Havoc-Core
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 1.0.0
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
