<?php

namespace Storeways\Shipper;

class Adapter
{
    public static $methods = [];

    public static function setMethod(string $id, array $data = [], $properties = [], array $view = [], $component = null)
    {
        $data['id'] = $id;
        $data['component'] = $component;
        $data['properties'] = $properties;
        $data['view'] = $view;

        $method[$id] = $data;

        static::$methods = array_merge(static::$methods, $method);
    }

    public static function getMethods()
    {
        return static::$methods;
    }

    public static function getMethod(string $methodId)
    {
        if (in_array($methodId, array_keys(static::$methods))) {
            return static::$methods[$methodId];
        }

        throw new \Exception ('Shipping method `' . $methodId . '` not found');
    }
}
