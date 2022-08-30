<?php

namespace App\Facades;

use BadMethodCallException;

abstract class Facade
{

	abstract protected static function getInstantAccessor();

	public static function __callStatic($method, $args)
	{
		$instance = static::getFacadeRoot();

		if (!$instance) {
			die('A facade root has not been set.');
		}

		if (method_exists($instance, $method)) {
			return $instance->$method(...$args);
		} else {
			throw new BadMethodCallException('Method not found');
		}
	}

	public static function getFacadeRoot()
	{
		return static::resolveFacadeInstance(static::getInstantAccessor());
	}

	protected static function resolveFacadeInstance($name)
	{
		if (is_object($name)) {
			return $name;
		}

		if (is_string($name)) {
			return new $name();
		}
	}
}