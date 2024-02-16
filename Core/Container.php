<?php

namespace Core;

class Container
{
    protected $bindings = [];

    //This method is used to register a dependency with the container.
    public function bind($key, $func)
    {
        $this->bindings[$key] = $func;
    }

    //This method is used to retrieve an instance of a dependency from the container.
    public function resolve($key)
    {
        if (! array_key_exists($key, $this->bindings)) {
            throw new \Exception("No matching binding found for {$key}");
        }

        $func = $this->bindings[$key];

        return call_user_func($func);
    }
}
