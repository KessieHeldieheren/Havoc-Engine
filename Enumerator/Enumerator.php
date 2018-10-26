<?php
declare(strict_types=1);

namespace Havoc\Engine\Enumerator;

/**
 * Havoc Engine enumerator.
 *
 * @package Havoc-Engine
 * @author Kessie Heldieheren <kessie@sdstudios.uk>
 * @version 0.0.0-alpha
 */
abstract class Enumerator
{
    /**
     * Constants cache.
     *
     * @var array
     */
    private static $cache = [];

    /**
     * Is a given name valid.
     *
     * @param string $name
     * @return bool
     */
    public static function validName(string $name): bool
    {
        $enumerables = self::getCache();
        $keys = array_keys($enumerables);

        return \in_array($name, $keys, true);
    }

    /**
     * Does a given value exist in the cache.
     *
     * @param mixed $value
     * @return bool
     */
    public static function validValue($value): bool
    {
        $enumerables = self::getCache();
        $values = array_values($enumerables);

        return \in_array($value, $values, true);
    }
    
    /**
     * Return the name of the first constant to match a given value.
     *
     * @param mixed $value
     * @return mixed
     * @since 1.3.0
     */
    public static function getName($value)
    {
        $enumerables = self::getCache();
        $result = array_search($value, $enumerables, true);
        
        if ($result === false) {
            throw EnumeratorException::valueNotFound();
        }
        
        return $result;
    }
    
    /**
     * Return all names of constants.
     *
     * @return array
     * @since 1.4.0
     */
    public static function getAllNames(): array
    {
        $enumerables = self::getCache();
        
        return array_keys($enumerables);
    }
    
    /**
     * Return the names of all constants that match a given value.
     *
     * @param $value
     * @return array
     * @since 1.3.0
     */
    public static function getAllMatchingNames($value): array
    {
        $enumerables = self::getCache();
        $result = array_keys($enumerables, $value, true);
    
        if ([] === $result) {
            throw EnumeratorException::valueNotFound();
        }
    
        return $result;
    }

    /**
     * Get value of a constant.
     *
     * @param string $name
     * @return mixed
     */
    public static function getValue(string $name)
    {
        $enumerables = self::getCache();

        if (!array_key_exists($name, $enumerables)) {
            throw EnumeratorException::nameInvalid($name);
        }

        return $enumerables[$name];
    }

	/**
	 * Returns all enumerable values.
	 *
	 * @return array
	 * @since 1.2.0
	 */
	public static function getAllValues(): array
	{
		$enumerables = self::getCache();
		$result = [];

		foreach ($enumerables as $enumerable => $value) {
			$result[] = $value;
		}

		return $result;
	}

	/**
     * Returns all constants of a class extending Enumerable.
     *
     * @return array
     * @throws EnumeratorException if a reflection exception occurs.
     */
    public static function getCache(): array
    {
    	$caller = static::class;

        if (!array_key_exists($caller, self::$cache)) {
            try {
                $reflected_caller = new \ReflectionClass($caller);
                self::$cache[$caller] = $reflected_caller->getConstants();
            } catch (\ReflectionException $re) {
                throw EnumeratorException::reflectionError($re->getMessage());
            }
        }

        return self::$cache[$caller];
    }
    
    /**
     * Count all enumerables.
     *
     * @return int
     * @since 1.5.0
     */
    public static function count(): int
    {
        return \count(self::getCache());
    }
}
